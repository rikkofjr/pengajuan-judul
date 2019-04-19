<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class IndexController extends Controller
{
    public function postsby($usernya)
    {   
        $posts = Post::where('usernya', $usernya)->paginate(5);
        return view('posts.index', compact('posts'));
    }
    public function postcat($categorynya)
    {   
        $posts = Post::where('categorynya', $categorynya)->paginate(5);
        return view('posts.index', compact('posts'));
    }
}
