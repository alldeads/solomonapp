<?php

namespace App\Admin\Controllers;

use App\Models\ItemHistory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PointsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Points History';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ItemHistory());

        $grid->column('id', __('Id'));
        $grid->column('reference', __('Reference'));
        $grid->column('user.username', __('User'));
        $grid->column('item_name', __('Item name'));
        $grid->column('item_points', __('Item points'));
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
        $show = new Show(ItemHistory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('reference', __('Reference'));
        $show->field('user_id', __('User id'));
        $show->field('item_name', __('Item name'));
        $show->field('item_points', __('Item points'));
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
        $form = new Form(new ItemHistory());

        $form->text('reference', __('Reference'));
        $form->text('user.username', __('User'))->disable();
        $form->text('item_name', __('Item name'));
        $form->text('item_points', __('Item points'));

        $form->select('status', __('Status'))
                ->options([
                    'pending' => 'Pending', 
                    'received' => 'Received',
                    'cancelled' => 'Cancelled',
                ]);

        return $form;
    }
}
