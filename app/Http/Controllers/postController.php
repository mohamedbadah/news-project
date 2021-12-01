<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest('id')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts,title'
        ]);
        $ex = $request->file('image')->getClientOriginalExtension();
        $newName = "post_" . time() . '.' . $ex;
        $request->file('image')->move(public_path('upload'), $newName);
        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $newName,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('post.index')->with('success', 'the post is save');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::select(['id', 'name'])->get();
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $newName = $post->image;
        if ($request->has('image')) {
            $ex = $request->file('image')->getClientOriginalExtension();
            $newName = "post_" . time() . '.' . $ex;
            $request->file('image')->move(public_path('upload'), $newName);
        }
        Post::find($id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'image' => $newName,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('post.index')->with('success', 'the data is update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('post.index');
    }
}
