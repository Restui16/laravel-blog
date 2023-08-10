<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $keyword = request()->keyword;

        if ($keyword) {
            $articles = Article::with('Category')
                        ->whereStatus(1)
                        ->where('title', 'like', '%' .$keyword.'%')
                        ->latest()
                        ->Paginate(5);
        } else {
            $articles = Article::with('Category')
                        ->whereStatus(1)
                        ->latest()
                        ->Paginate(5);
        }

        $categories = Category::latest()->get();
        return view('front.article.index', compact('articles', 'categories', 'keyword'));
    }

    public function show($slug)
    {
        $article = Article::with('Category')->whereSlug($slug)->first();
        $categories = Category::latest()->get();
        return view('front.article.show', compact('article', 'categories'));
    }
}
