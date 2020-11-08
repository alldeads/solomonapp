<?php

namespace App\Admin\Controllers;

use App\Models\Order;
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

        $grid->column('user.username', __('User'));
        $grid->column('reference', __('Reference'));
        $grid->column('sub_total', __('Sub total'));
        $grid->column('total', __('Total'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('payment_id', __('Payment id'));
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

        $form->text('user.username', __('User'))->disable();
        $form->text('reference', __('Reference'));
        $form->decimal('sub_total', __('Sub total'));
        $form->decimal('total', __('Total'));
        $form->decimal('quantity', __('Quantity'));
        $form->number('payment_id', __('Payment id'));
        $form->text('shipping_type', __('Shipping type'));
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

        return $form;
    }
}
