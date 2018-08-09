<?php

namespace App\Admin\Controllers;

use App\Admin\Models\DemoList;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DemoListController extends Controller
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

            $content->header('案例列表');
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
            $content->header('案例列表 【编辑】');
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

            $content->header('案例列表 【添加】');
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
        return Admin::grid(DemoList::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('案例名');
            $grid->cat_id('分类ID')->sortable();
            $grid->l_url('大图');
            $grid->m_url('略缩图');
            $grid->abstract('简介');
            $grid->remark('备注');
            $grid->created_at('创建时间')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(DemoList::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name', '案例名');
            $form->text('d_list.cat_id');
            $form->number('p_order', '排序');
            $form->datetime('created_at');
            $form->datetime('updated_at');

        });
    }
}
