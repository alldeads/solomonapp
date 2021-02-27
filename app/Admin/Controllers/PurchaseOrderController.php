<?php

namespace App\Admin\Controllers;

use App\Models\PurchaseOrder;
use App\Models\Product;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PurchaseOrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Purchase Orders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PurchaseOrder());

        $grid->column('id', __('Id'));
        $grid->column('product.name', __('Product'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('user.first_name', __('Approved By'));
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
        $show = new Show(PurchaseOrder::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_id', __('Product'));
        $show->field('quantity', __('Quantity'));
        $show->field('approved_by', __('Approved by'));
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
        $form = new Form(new PurchaseOrder());

        $form->select('product_id', 'Product')->options(function ($id) {
            $product = Product::find($id);

            if ($product) {
                return [$product->id => $product->name];
            }
        })->ajax('/admin/api/products');
        $form->number('quantity', __('Quantity'));
        $form->select('approved_by', 'Approved By')->options(function ($id) {
            $user = User::find($id);

            if ($user) {
                return [$user->id => $user->username];
            }
        })->ajax('/admin/api/users');
        $form->select('status', __('Status'))
                ->options([
                    'pending' => 'Pending',
                    'received' => 'Received',
                    'cancelled' => 'Cancelled'
                ]);

        return $form;
    }
}
