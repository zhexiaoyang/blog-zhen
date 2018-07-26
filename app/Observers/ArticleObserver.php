<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Tag;


class ArticleObserver
{
    public function saving(Article $article)
    {
        $article->excerpt = make_excerpt($article->description);
    }


    public function created(Article $article)
    {
        if ($article->is_display && !empty($_POST['tags']))
        {
            $tags = $_POST['tags'];
            foreach ($tags as $tag) {
                if (intval($tag))
                {
                    Tag::find(intval($tag))->increment('article_count');
                }
            }
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
            foreach ($article->tags as $tag) {
                $tag->decrement('article_count');
            }
        }
    }

    /**
     * User: zhangzhen
     * Date: 2018/7/12 11:08
     * @param Article $article
     */
    public function updated(Article $article)
    {
        if ($article->getOriginal()['is_display'] - $article->is_display === 1)
        {
            foreach ($article->tags as $tag) {
                $tag->decrement('article_count');
            }
        }
        if ($article->getOriginal()['is_display'] - $article->is_display === -1)
        {
            foreach ($article->tags as $tag) {
                $tag->increment('article_count');
            }
        }
    }
}