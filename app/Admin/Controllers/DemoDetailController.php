<?php

namespace App\Admin\Controllers;

use App\Admin\Models\DemoDetail;

use App\Admin\Models\DemoList;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DemoDetailController extends Controller
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

            $content->header('案例详情');
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

            $content->header('编辑案例详情');

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

            $content->header('新加案例详情');

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
        return Admin::grid(DemoDetail::class, function (Grid $grid) {
            $grid->demo_id('案例ID');
            $grid->qrcode_url('二维码')->sortable();
            $grid->img1('图1');
            $grid->img2('图2');
            $grid->img3('图3');
            $grid->img4('图4');
            $grid->img5('图5');
            $grid->watermark('水印')->display(function ($released) {
                return $released ? '是' : '否';
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(DemoDetail::class, function (Form $form) {
            $demolist=DemoList::get(['id','name']);
            foreach ($demolist as $val){
                $option[$val['id']]=$val['name'];
            }
            $form->display('id', 'ID');
            $form->select('demo_id','案例ID')->options($option);
            $form->text('qrcode_url', '二维码url');
            $form->text('img1', '图1地址');
            $form->text('img2', '图1地址');
            $form->text('img3', '图1地址');
            $form->text('img4', '图1地址');
            $form->text('img5', '图1地址');
            $form->select('watermark','水印')->options(['1'=>'有','0'=>'无']);
            $form->datetime('created_at');
            $form->datetime('updated_at');
        });
    }
}
