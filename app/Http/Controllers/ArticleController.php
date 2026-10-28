<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [new Middleware('auth', only: ['create'])];
    }

    public function index()
    {

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function byCategory(Category $category)
    {

        $categories = Category::orderBy('name')->get();
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('articles.byCategory', compact('articles', 'categories', 'category'));
    }

    public function create()
    {

        return view('articles.create');
    }
}
