<?php

namespace App\Admin\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InventoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Inventory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Inventory());

        $grid->column('id', __('Id'));
        $grid->column('product.name', __('Product Name'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('threshold', __('Threshold'));
        $grid->column('reserved', __('Reserved'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Inventory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_id', __('Product id'));
        $show->field('quantity', __('Quantity'));
        $show->field('threshold', __('Threshold'));
        $show->field('reserved', __('Reserved'));
        $show->field('created_at', __('Created at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Inventory());

        $form->select('product_id', 'Product')->options(function ($id) {
            $product = Product::find($id);

            if ($product) {
                return [$product->id => $product->name];
            }
        })->ajax('/admin/api/products');
        $form->number('quantity', __('Quantity'));
        $form->number('threshold', __('Threshold'));
        $form->display('reserved', __('Reserved'));

        return $form;
    }
}
