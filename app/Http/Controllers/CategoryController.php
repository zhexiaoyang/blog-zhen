<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        // 读取分类 ID 关联的文章，并按每 20 条分页
        $articles = Article::display()->where('category_id', $category->id)->paginate(1);
        // 传参变量文章和分类到模板中
        return view('article.categories', compact('articles', 'category'));
    }
}
