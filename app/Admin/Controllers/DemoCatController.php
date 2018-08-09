<?php

namespace App\Admin\Controllers;

use App\Admin\Models\DemoCat;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DemoCatController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('案例分类列表');
            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('编辑案例分类');
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('添加案例分类');
            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(DemoCat::class, function (Grid $grid) {

            $grid->cat_id('ID')->sortable();
            $grid->cat_name('分类名');
            $grid->p_order('排序')->sortable();
            $grid->created_at('创建时间');
            $grid->updated_at('修改时时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(DemoCat::class, function (Form $form) {
            $form->display('cat_id', 'ID');
            $form->text('cat_name', '分类名');
            $form->number('parent_id', '父类ID');
            $form->number('p_order', '排序');
            $form->datetime('created_at');
            $form->datetime('updated_at');
//            $form->ignore(['cat_path']);
        });
    }
}
