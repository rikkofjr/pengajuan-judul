<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class FrontendController extends Controller
{
    //  Post->all post
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->paginate(3); 
        return view('posts.index', compact  ('posts'));
    }
    // Post->show by id
    public function postshow($id)
    {
        $post = Post::findOrFail($id); //Find post of id = $id
        return view ('posts.show', compact('post'));
    }
    //
    public function category()
    {
        $posts = Category::orderby('id_cat', 'desc')->paginate(5); 
        return view('category.index', compact  ('posts'));
    }
    
}
