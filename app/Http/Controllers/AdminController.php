<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $post_count = Post::count();
        $category_count = Category::count();
        $user_count = User::count();

        return view('admin.index', compact('post_count', 'category_count', 'user_count'));
    }
}
