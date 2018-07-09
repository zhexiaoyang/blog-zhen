<?php

namespace App\Admin\Controllers;

use App\Models\Tag;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class TagController extends Controller
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

            $content->header('标签列表');
            $content->description('文章标签');

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

            $content->header('标签列表');
            $content->description('文章标签');

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

            $content->header('标签列表');
            $content->description('文章标签');

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
        return Admin::grid(Tag::class, function (Grid $grid) {
//            搜索
            $grid->filter(function($filter){
                // 去掉默认的id过滤器
                $filter->disableIdFilter();
                // 在这里添加字段过滤器
                $filter->like('title', '标签内容');
            });
//            字段显示
            $grid->id('ID')->sortable();
            $grid->title('标签名称');
//            $grid->is_display('是否显示')->display(function ($value) {
//                return $value ? '是' : '否';
//            });
            $states = [
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'default'],
            ];
            $grid->is_display('是否显示')->switch($states);
            $grid->order('排序')->editable();
            $grid->article_count('文章数');
            $grid->created_at('创建时间');
            $grid->updated_at('更新时间');
//            禁用默认工具
            $grid->tools(function ($tools) {
                // 禁用批量删除按钮
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
            $grid->disableRowSelector();
            $grid->disableExport();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Tag::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '标签名称')->rules('required');
            $form->text('description', '标签描述');
            $form->radio('is_display', '显示')->options(['1' => '是', '0'=> '否'])->default('1');
            $form->text('order', '排序')->default(100);

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
