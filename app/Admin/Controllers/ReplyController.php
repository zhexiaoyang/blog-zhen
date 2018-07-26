<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Tools\ReplyDisplay;
use App\Models\Reply;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Request;

class ReplyController extends Controller
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

            $content->header('回复列表');
            $content->description('文章回复');

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

            $content->header('回复列表');
            $content->description('文章回复');

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

            $content->header('回复列表');
            $content->description('文章回复');

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
        return Admin::grid(Reply::class, function (Grid $grid) {
            $grid->tools(function ($tools) {
                $tools->append(new ReplyDisplay());
            });
//            搜索
            if (in_array(Request::get('display'), ['0', '1'])) {
                $grid->model()->where('is_display', Request::get('display'));
            }
            $grid->model()->orderBy('id', 'desc');
            $grid->filter(function($filter){
                // 去掉默认的id过滤器
                $filter->disableIdFilter();
                // 在这里添加字段过滤器
                $filter->like('title', '回复内容');
            });
//            字段显示
            $grid->id('ID')->sortable();
//            $grid->is_display('是否显示')->display(function ($value) {
//                return $value ? '是' : '否';
//            });
            $states = [
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'default'],
            ];
            $grid->article()->id('文章ID');
            $grid->article()->title('文章标题');
            $grid->nickname('昵称');
            $grid->email('邮箱');
            $grid->content('内容');
            $grid->url('地址');
            $grid->is_display('是否显示')->switch($states);
            $grid->created_at('创建时间');
//            禁用默认工具
            $grid->tools(function ($tools) {
                // 禁用批量删除按钮
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->disableCreateButton();
            $grid->disableFilter();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Reply::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '回复名称')->rules('required');
            $form->text('description', '回复描述');
            $form->radio('is_display', '显示')->options(['1' => '是', '0'=> '否'])->default('1');
            $form->text('order', '排序')->default(100);

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
