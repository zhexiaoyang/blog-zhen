<?php

namespace App\Observers;

use App\Models\Article;


class ArticleObserver
{
    public function saving(Article $article)
    {
        $article->excerpt = make_excerpt($article->description);
    }


    public function created(Article $article)
    {
        if ($article->is_display)
        {
            $article->tag()->increment('article_count');
        }
    }

    /**
     * User: zhangzhen
     * Date: 2018/7/12 11:08
     * @param Article $article
     */
    public function deleted(Article $article)
    {
        if ($article->is_display)
        {
            $article->tag()->decrement('article_count');
        }
    }

    /** 什么鬼 */
    public function updated(Article $article)
    {
        if ($article->getOriginal()['is_display'] - $article->is_display === 1)
        {
            $article->tag()->decrement('article_count');
        }
        if ($article->getOriginal()['is_display'] - $article->is_display === -1)
        {
            $article->tag()->increment('article_count');
        }
    }
}