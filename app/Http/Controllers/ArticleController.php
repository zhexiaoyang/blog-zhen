<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        $relevants = Article::display()->where('category_id', $article->category_id)->orderBy('id','desc')->paginate(5);
        $recommends = Article::display()->where('is_recommend', true)->orderBy('id','desc')->paginate(5);
        $hots = Article::display()->orderBy('view_count','desc')->paginate(5);
        $tags = Tag::display()->orderBy('id','desc')->get();

        return view('article.show', compact('article', 'recommends', 'hots', 'tags', 'prev_article', 'next_article', 'relevants'));
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
