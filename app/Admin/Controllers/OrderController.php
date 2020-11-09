<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

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

        $grid->column('user_id', __('Full Name'))->display(function($id) {
            $user = User::findOrFail($id);

            return "<a href='/admin/users/".$id."/edit'>" . $user->full_name. "</a>";

        });
        $grid->column('user.username', __('Username'));
        $grid->column('reference', __('Reference'));
        $grid->column('sub_total', __('Sub total'));
        $grid->column('total', __('Total'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('payment_id', __('Payment'))->display(function ($id) {

            return "<a href='/admin/payments/".$id."/edit' target='_blank'>Click Here</a>";
        });
        $grid->column('shipping_type', __('Shipping type'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));

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

        $form->hidden('user_id');
        $form->hidden('id');
        $form->text('user.username', __('User'))->disable();
        $form->text('reference', __('Reference'))->disable();
        $form->decimal('sub_total', __('Sub total'));
        $form->decimal('total', __('Total'));
        $form->decimal('quantity', __('Quantity'));

        $form->select('shipping_type', __('Shipping type'))
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
                    'delivered' => 'Delivered',
                    'on-hold' => 'On Hold',
                    'cancelled' => 'Cancelled',
                ]);

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
                    $user->save();
                }
            }
        });

        return $form;
    }
}
