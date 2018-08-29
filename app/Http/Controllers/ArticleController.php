<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Nav;
use App\Models\Reply;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Exceptions\InvalidRequestException;

class ArticleController extends Controller
{
    public function show(Article $article, Request $request)
    {
        // 判断文章是否隐藏，如果隐藏则抛出异常。
        if (!$article->is_display) {
            throw new InvalidRequestException('文章不存在');
        }

        $article->increment('view_count');
        $prev_article = Article::find($this->getPrevArticleId($article->id));
        $next_article = Article::find($this->getNextArticleId($article->id));
        $relevants = Article::display()->where('category_id', $article->category_id)->where('id', '<>', $article->id)->orderBy('order','desc')->paginate(config('index_article_numbers'));

        $replies = Reply::display()->orderBy('id','desc')->paginate(10);

//        $replies = Reply::display()->where('article_id', $article->id)->where('parent_id', 0)->orderBy('order','asc')->paginate(3);
//        dd($article->replies[0]->children);
//        dd($replies);
        return view('article.show', compact('article',  'prev_article', 'next_article', 'relevants', 'replies'));
    }

    public function like(Article $article)
    {
        if ( $article->increment('like_count') )
        {
            return response($article->like_count, 200);
        }
    }

    protected function getPrevArticleId($id)
    {
        return Article::display()->where('id', '<', $id)->max('id');
    }

    protected function getNextArticleId($id)
    {
        return Article::display()->where('id', '>', $id)->min('id');
    }

}
