<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Products';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('original_price', __('Original price'));
        $grid->column('members_price', __('Members price'));
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('sku', __('Sku'));
        $show->field('description', __('Description'));
        $show->field('quantity', __('Quantity'));
        $show->field('original_price', __('Original price'));
        $show->field('members_price', __('Members price'));
        $show->field('discounted_price', __('Discounted price'));
        $show->field('avatar', __('Avatar'));
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
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->number('quantity', __('Quantity'));
        $form->decimal('original_price', __('Original price'));
        $form->decimal('members_price', __('Members price'));
        $form->decimal('discounted_price', __('Discounted price'));
        $form->image('avatar', __('Avatar'));

        return $form;
    }
}
