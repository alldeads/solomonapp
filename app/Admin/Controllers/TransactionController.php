<?php

namespace App\Admin\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\PaymentMethod;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class TransactionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cash Out Transaction';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Transaction());

        $grid->column('reference', __('Reference'));
        $grid->column('user_id', __('User'))->display(function($id) {
            $user = User::findOrFail($id);

            return "<a href='/admin/users/".$id."/edit'>" . $user->full_name. "</a>";

        });
        $grid->column('amount', __('Amount'));
        $grid->column('method.name', __('Payment Method'));
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
        $show = new Show(Transaction::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('reference', __('Reference'));
        $show->field('user_id', __('User id'));
        $show->field('full_name', __('Full name'));
        $show->field('phone', __('Phone'));
        $show->field('account_number', __('Account number'));
        $show->field('amount', __('Amount'));
        $show->field('payment_method_id', __('Payment method id'));
        $show->field('bank', __('Bank'));
        $show->field('status', __('Status'));
        $show->field('approved_by', __('Approved by'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    public function getMethod( Request $request ) {
        $q = $request->get('q');

        return PaymentMethod::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Transaction());

        $form->text('reference', __('Reference'));
        $form->hidden('user_id', __('User id'));
        $form->text('full_name', __('Full name'));
        $form->mobile('phone', __('Phone'));
        $form->text('account_number', __('Account number'));
        $form->decimal('amount', __('Amount'));
        $form->select('payment_method_id', 'Payment Method')->options(function ($id) {
            $pm = PaymentMethod::find($id);

            if ($pm) {
                return [$pm->id => $pm->name];
            }
        })->ajax('/admin/api/methods');
        $form->text('bank', __('Bank'));
        $form->select('status', __('Status'))
                ->options([
                    'pending' => 'Pending', 
                    'paid' => 'Paid', 
                    'fraud' => 'Fraud',
                    'cancelled' => 'Cancelled',
                ]);

        return $form;
    }
}
