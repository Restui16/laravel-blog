<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
    {
        $category_id = Category::find($id);
        $articles = Article::where('category_id', $id)
                    ->whereStatus(1)
                    ->latest()
                    ->Paginate(3);
        // dd($articles);
        return view('front.category.index', compact('articles', 'category_id'));
    }
}
