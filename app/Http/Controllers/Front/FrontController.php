<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\BlogCateagory;

class FrontController extends Controller
{
    public function home(){
        return view('front.home.home',[
            'articles'=> Article::where('status',1)->get(),
        ]);
    }
    public function articleDetails($slug){
        return view('front.articles.details',[
            'article' => Article::where('slug', $slug)->first(),
            'recentArticles'=>Article::where('status',1)->latest()->take(3)->get(),

        ]);
    }
    public function categoryBlogs($id){
        return view('front.blogs.blogs',[
            'blogs'=>Blog::where('blog_category_id', $id)->where('status',1)->paginate(1),
        ]);
    }


}
