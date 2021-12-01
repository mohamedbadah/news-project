<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\contactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class pagesController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->simplePaginate(2);
        return view('front.index', compact('posts'));
    }
    public function slug($slug)
    {
        $posts = Post::where('slug', $slug)->first();
        return view('front.post', compact('posts'));
    }
    public function about()
    {
        return view('front.about');
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function contactUs(Request $request)
    {
        Mail::to('admin@admin.com')->send(new contactMail($request->except('_token')));
        return redirect()->back();
    }
}
