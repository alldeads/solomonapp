<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->model()->orderBy('id', 'desc');

        $grid->column('id', __('Id'));
        $grid->column('sponsor.username', __('Sponsor'));
        $grid->column('username', __('Username'));
        $grid->column('available_points', __('Points'));
        $grid->column('direct_recruits', __('Direct recruits'));
        $grid->column('commission', __('Commission'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));


        $grid->filter(function($filter){

            // Remove the default id filter
            $filter->disableIdFilter();

            // Add a column filter
            $filter->like('username', 'User Name');

            $filter->equal('status')->radio([
                ''   => 'All',
                'inactive'  => 'Inactive',
                'active'    => 'Active',
            ]);


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
        $show = new Show(User::findOrFail($id));

        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('username', __('Username'));
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('company', __('Company'));
        $show->field('position', __('Position'));
        $show->field('used_points', __('Used points'));
        $show->field('available_points', __('Available points'));
        $show->field('direct_recruits', __('Direct recruits'));
        $show->field('product_sold', __('Product sold'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    public function getUser( Request $request ) {
        $q = $request->get('q');

        return User::where('username', 'like', "%$q%")->paginate(null, ['id', 'username as text']);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->hidden('id');
        $form->select('sponsor_id', 'Sponsor')->options(function ($id) {
            $user = User::find($id);

            if ($user) {
                return [$user->id => $user->username];
            }
        })->ajax('/admin/api/users');

        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->text('username', __('Username'));
        $form->email('email', __('Email'));
        $form->text('phone', __('Phone'));
        $form->number('available_points', __('Available points'));

        $form->select('status', __('Status'))
                ->options([
                    'active' => 'Active', 
                    'inactive' => 'Inactive',
                ]);
        $form->password('password', __('Password'));

        $form->saving(function (Form $form) {

            $user = User::find($form->id);

            if ( !$form->password ) {
                $form->password = $user->password;
            } else {
                $form->password = bcrypt($form->password);
            }
        });

        return $form;
    }
}
