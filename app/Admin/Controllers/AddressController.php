<?php

namespace App\Admin\Controllers;

use App\Models\Address;
use App\Models\User;
use App\Models\City;
use Encore\Admin\Controllers\AdminController;
use Illuminate\Http\Request;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AddressController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Address';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Address());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('Full Name'))->display(function($id) {
            $user = User::findOrFail($id);

            return "<a href='/admin/users/".$id."/edit'>" . $user->full_name. "</a>";

        });
        $grid->column('phone', __('Phone'));
        $grid->column('city', __('City'));
        $grid->column('zip', __('Zip'));
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
        $show = new Show(Address::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('address', __('Address'));
        $show->field('country', __('Country'));
        $show->field('state', __('State'));
        $show->field('city', __('City'));
        $show->field('zip', __('Zip'));
        $show->field('notes', __('Notes'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    public function getCity( Request $request ) {
        $q = $request->get('q');

        return City::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Address());

        $form->select('user_id', 'User')->options(function ($id) {
            $user = User::find($id);

            if ($user) {
                return [$user->id => $user->username];
            }
        })->ajax('/admin/api/users');
        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));
        $form->text('address', __('Address'));
        $form->text('country', __('Country'))->default('philippines');
        $form->text('state', __('State'));

        $cities = [];

        foreach (City::where('status', 'active')->get() as $c) {
            $cities[$c->name] = $c->name;
        }

        $form->select('city', __('City'))
                ->options($cities);

        $form->text('zip', __('Zip'));
        $form->textarea('notes', __('Notes'));

        return $form;
    }
}
