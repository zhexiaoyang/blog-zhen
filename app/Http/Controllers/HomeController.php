<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::display()->orderBy('id','desc')->paginate(15);
        $recommends = Article::display()->where('is_recommend', true)->orderBy('id','desc')->paginate(5);
        $hots = Article::display()->orderBy('view_count','desc')->paginate(5);
        $tags = Tag::display()->orderBy('id','desc')->get();

        return view('home.index', compact('articles', 'recommends', 'hots', 'tags'));
    }
}
