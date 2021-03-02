<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Address;
use Encore\Admin\Controllers\AdminController;
Use Encore\Admin\Widgets\Table;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use Carbon\Carbon;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->model()->orderBy('id', 'desc');

        $grid->column('reference', __('Reference'))->setAttributes(['style' => 'color:red;']);

        $grid->column('type', __('Type'))->setAttributes(['style' => 'color:purple;'])->ucfirst();;

        $grid->column('user_id', __('Full Name'))->display(function($id) {
            $user = User::findOrFail($id);

            return "<a href='/admin/users/".$id."/edit'>" . $user->full_name. "</a>";

        });
        $grid->column('user.username', __('Username'));
        
        $grid->column('order_detail_id', 'Details')->modal('Order Details', function ($model) {

            $details = $model->order_details()->get()->map(function ($detail) {
                return $data = [
                    'id'       => $detail->id,
                    'product'  => $detail->product->name,
                    'quantity' => $detail->product_quantity
                ];
            });

            return new Table(['ID', 'Product', 'Quantity'], $details->toArray());
        });
        $grid->column('payment.address_id', __('Address'))->display(function($id) {
            $address = Address::findOrFail($id);

            return "<a href='/admin/addresses/".$id."/edit' target='_blank'>View</a>";
        });
        $grid->column('total', __('Total'))->display(function($total) {

            return "₱" . number_format($total, 2, '.', ',');
        });
        $grid->column('shipping_fee', __('Shipping Fee'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('payment_id', __('Payment'))->display(function ($id) {

            return "<a href='/admin/payments/".$id."/edit' target='_blank'>Click Here</a>";
        });
        $grid->column('shipping_type', __('Shipping type'))->ucfirst();;
        $grid->column('status', __('Status'))->ucfirst();;
        $grid->column('created_at', __('Created at'))->display(function ($created_at) {
            return Carbon::parse($created_at)->format('F j, Y h:m a');
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('reference', __('Reference'));
        $show->field('sub_total', __('Sub total'));
        $show->field('total', __('Total'));
        $show->field('quantity', __('Quantity'));
        $show->field('payment_id', __('Payment id'));
        $show->field('shipping_type', __('Shipping type'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->column(1/2, function ($form) {
            $form->hidden('user_id');
            $form->hidden('id');

            $form->text('user.username', __('User'))->disable();
            $form->text('reference', __('Reference'))->disable();
            $form->decimal('sub_total', __('Sub Total Amount'));
            $form->decimal('shipping_fee', __('Shipping Fee'));
            $form->decimal('total', __('Total Amount'));
            $form->decimal('quantity', __('Total Quantity'));

            $form->select('type', __('Order Type'))
                    ->options([
                        'order'   => 'Order', 
                        'package' => 'Package'
                    ]);

            $form->select('shipping_type', __('Shipping Type'))
                    ->options([
                        'pick-up' => 'Pick Up', 
                        'delivery' => 'Delivery'
                    ]);

            $form->select('status', __('Status'))
                    ->options([
                        'pending' => 'Pending', 
                        'processing' => 'Processing',
                        'accepted' => 'Accepted',
                        'for-delivery' => 'For Delivery',
                        'out-for-delivery' => 'Out For Delivery',
                        'delivered' => 'Delivered',
                        'on-hold' => 'On Hold',
                        'cancelled' => 'Cancelled',
                    ]);
        });

        $form->column(1/2, function ($form) {
            $form->hasMany('order_details', function (Form\NestedForm $form) {
                $form->select('product_id', 'Product')->options(function ($id) {
                    $product = Product::find($id);

                    if ($product) {
                        return [$product->id => $product->name];
                    }
                })->ajax('/admin/api/products');

                $form->decimal('product_price', __('Price'));

                $form->text('product_quantity', 'Quantity');
            });
        });

        $form->saving(function (Form $form) {

            $user = User::findOrFail($form->user_id);
            $order = Order::findOrFail($form->id);
            $commission = 0;

            if ( $order->status != "accepted" && $form->status == "accepted" ) {
                if ( $form->quantity != 0 ) {
                    User::pass_up_points($user->id, $form->quantity);

                    foreach ($order->order_details as $value) {
                        $total = ($value->product_price - $value->product_price_m) * $value->product_quantity;

                        $commission += $total;
                    }

                    $user->product_sold += $form->quantity;
                    $user->commission += $commission;
                    $user->ppb += $form->quantity;
                    $user->lifetime_earning += $commission;
                    $user->save();
                }
            }
        });

        return $form;
    }
}
