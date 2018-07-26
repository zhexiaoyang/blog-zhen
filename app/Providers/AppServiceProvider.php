<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Nav;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use Encore\Admin\Config\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // laravel-admin 配置插件
        Config::load();
        // laravel 时间汉化
        \Carbon\Carbon::setLocale('zh');
        // 监控模型
        \App\Models\Article::observe(\App\Observers\ArticleObserver::class);
        \App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
        // 视图共享数据
        view()->composer('*', function ($view) {
            $recommends = Article::display()->where('is_recommend', true)->orderBy('id','desc')->paginate(5);
            $hots = Article::display()->orderBy('view_count','desc')->paginate(5);
            $tags = Tag::display()->orderBy('id','desc')->get();
            $navs = Nav::buildNestedArray(Nav::display()->orderBy('order','desc')->get()->toArray());
            $view->with(compact(['recommends','hots','tags','navs']));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
