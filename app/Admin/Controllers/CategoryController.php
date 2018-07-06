<?php

namespace App\Admin\Controllers;

use App\Models\Category;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CategoryController extends Controller
{
    use ModelForm;

    /**
     * 首页
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('分类列表');
            $content->body(Category::tree());
        });
    }

    /**
     * 编辑
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('编辑商品');
//            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * 添加
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('创建分类');
//            $content->description('description');

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
        return Admin::grid(Category::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * 添加、编辑表单
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Category::class, function (Form $form) {


            $form->display('id', 'ID');

            $form->select('parent_id', '上级分类')->options(Category::selectOptions());
            $form->text('title', '分类名称')->rules('required');
//            $form->icon('icon', '图标')->default('fa-bars')->rules('required')->help('温馨提示：balbal');
            $form->text('description', '描述')->default('');
            $form->text('order', '排序')->default(100)->rules('required');
            $form->radio('is_display', '是否显示')->options(['1' => '是', '0'=> '否'])->default('0');


            $form->display('created_at', trans('admin.created_at'));
            $form->display('updated_at', trans('admin.updated_at'));
        });
    }
}
