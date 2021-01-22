<?php

namespace App\Admin\Controllers;

use App\Models\Address;
use App\Models\Payment;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PaymentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Payment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Payment());

        $grid->column('type', __('Type'));
        $grid->column('reference_code', __('Reference code'));
        $grid->column('user_id', __('Full Name'))->display(function($id) {
            $user = User::findOrFail($id);

            return "<a href='/admin/users/".$id."/edit'>" . $user->full_name. "</a>";

        });
        $grid->column('address.id', __('Address'))->display(function($id) {
            $address = Address::findOrFail($id);

            return "<a href='/admin/addresses/".$id."/edit' target='_blank'>View</a>";
        });
        $grid->column('user.username', __('User Name'));
        $grid->column('method.name', __('Payment Method'));
        $grid->column('mode', __('Mode'));
        $grid->column('amount', __('Amount'))->display(function($total) {

            return "₱" . number_format($total, 2, '.', ',');
        });
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
        $show = new Show(Payment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('address_id', __('Address id'));
        $show->field('payment_method_id', __('Payment method id'));
        $show->field('reference_code', __('Reference code'));
        $show->field('amount', __('Amount'));
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
        $form = new Form(new Payment());

        $form->text('user.username', __('User'))->disable();
        $form->text('method.name', __('Payment Method'))->disable();
        $form->text('reference_code', __('Reference code'));
        $form->decimal('amount', __('Amount'));
        $form->select('status', __('Status'))
                ->options([
                    'pending' => 'Pending', 
                    'processing' => 'Processing', 
                    'received' => 'Received',
                    'refunded' => 'Refunded',
                    'fraud' => 'Fraud',
                    'on-hold' => 'On Hold',
                    'rejected' => 'Rejected',
                ]);

        return $form;
    }
}
