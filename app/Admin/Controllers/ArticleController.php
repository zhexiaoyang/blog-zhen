<?php

namespace App\Admin\Controllers;

use App\Models\Article;

use App\Models\Category;
use App\Models\Tag;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;
use zgldh\QiniuStorage\QiniuStorage;

class ArticleController extends Controller
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

            $content->header('文章列表');
//            $content->description('description');

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

            $content->header('编辑文章');
//            $content->description('description');

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

            $content->header('添加文章');
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
        return Admin::grid(Article::class, function (Grid $grid) {
            $grid->filter(function($filter){
                // 去掉默认的id过滤器
                $filter->disableIdFilter();
                // 在这里添加字段过滤器
                $filter->like('title', 'title');
            });

            $grid->id('ID')->sortable();
            $grid->title('文章标题');
            $states = [
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'primary'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'default'],
            ];
            $grid->column('设置')->switchGroup([
                    'is_display' => '显示',
                    'is_slider' => '轮播',
                    'is_recommend' => '推荐',
                ], $states);
//            $grid->is_display('显示')->switch($states);
//            $grid->is_slider('轮播')->switch($states);
//            $grid->is_recommend('推荐')->switch($states);
            $grid->category_id('分类名称')->editable('select', Category::selectOptionsArticleList());
            $grid->order('排序')->editable();
            $grid->view_count('查看');
            $grid->reply_count('回复');

//            $grid->actions(function ($actions) {
//                $actions->disableDelete();
//            });

            $grid->disableExport();
            $grid->disableRowSelector();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Article::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('category_id', '文章分类')->options(Category::selectOptions());
            $form->listbox('tags','文章标签')->options(Tag::display()->get()->pluck('title', 'id'))->rules('required');
            $form->text('title', '文章标题')->rules('required');
            $form->image('image', '封面图片')->rules('required|image');
            $form->text('order', '排序')->default(100)->rules('required');
            $form->radio('is_slider', '是否轮播')->options(['1' => '是', '0'=> '否'])->default('0');
            $form->radio('is_display', '是否显示')->options(['1' => '是', '0'=> '否'])->default('0');
            $form->radio('is_recommend', '是否推荐')->options(['1' => '是', '0'=> '否'])->default('0');
            $form->editor('description', '文章内容')->rules('required');

            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }

    public function uploadImage(Request $request)
    {
        if ($file = $request->file('file')) {

            $extension = strtolower($file->getClientOriginalExtension());
            if ($extension && in_array($extension, ["png", "jpg", "gif", 'jpeg'])) {
                $disk = QiniuStorage::disk('qiniu');
                $url = $disk->put('images',$file);
                $data = ['filename' => config('app.img_url').$url];
            }else{
                $data['error'] = '格式不正确';
            }
        } else {
            $data['error'] = '没有收到图片';
        }
        return $data;
    }
}
