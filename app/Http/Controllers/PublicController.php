<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $categories = Category::orderBy('name')->get();

        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(5)->get();

        return view('welcome', compact('articles', 'categories'));
    }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');

        if (! is_string($query) || trim($query) === '') {
            return redirect()->route('tutti-gli-articoli');
        }

        $query = trim($query);
        $articles = Article::search($query)->where('is_accepted', true)->paginate(10);

        return view('articles.searched', ['articles' => $articles, 'query' => $query]);
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);

        return redirect()->back();
    }

    public function aboutUs()
    {
        return view('info.chi-siamo');
    }

    public function privacyPolicy(): View
    {
        return view('info.privacy');
    }

    public function termsAndConditions(): View
    {
        return view('info.termini-e-condizioni');
    }
}
