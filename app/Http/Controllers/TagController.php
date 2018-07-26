<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        // 读取分类 ID 关联的文章，并按每 20 条分页
        $articles = $tag->articles()->display()->paginate(10);
        // 传参变量文章和分类到模板中
        return view('article.tags', compact('articles', 'tag'));
    }
}
