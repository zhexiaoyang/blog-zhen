<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Nav;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::display()->orderBy('id','desc')->paginate(15);

        $likes = Article::display()->orderBy('like_count','desc')->paginate(5);

        $sliders = Article::display()->where('is_slider',true)->orderBy('id','desc')->paginate(4);

        return view('home.index', compact('articles', 'sliders', 'likes'));
    }
}
