<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $posts = Post::latest('id')->paginate(7);
        return view('index',["posts"=>$posts]);
    }
    public function detail($slug){
        $post = Post::where('slug', $slug)->first();
        return view('post.detail',compact('post'));
    }
}
