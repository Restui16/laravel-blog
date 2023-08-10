<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $articles = Article::with('Category')
                        ->whereStatus(1)
                        ->latest()
                        ->cursorPaginate(5);

        $latest_post = Article::latest()->first();
        $categories = Category::latest()->get();

        return view('front.home.index', compact('latest_post', 'articles', 'categories'));
    }
}
