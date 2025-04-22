<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
   
    public function index()
    {

        return view('admin.blog.manage', ['blogs' => Blog::where('user_id', Auth::user()->id)->get()]);
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    private $user;
    public function store(Request $request)
    {
        $this->user = Auth::user();
        Blog::newBlog($request, $this->user->id);
        return back()->with('message', 'New blog added');
    }

  
    public function show(Blog $blog)
    {
        return view('admin.blog.detal', ['blog' => Blog::find($blog->id)]);
    }

    
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', ['blog' => Blog::find($blog->id)]);
    }

   
    public function update(Request $request, Blog $blog)
    {
        Blog::updateBlog($request, $blog->id);
        return redirect('/blogs')->with('message', 'Blog has updated');
    }

    
    public function destroy(Blog $blog)
    {
        Blog::deleteBlog($blog->id);
        return back()->with('message', 'Blog is deleted successfully');
    }
    public function showAll()
    {
        return view('admin.blog.all-blogs', ['blogs' => Blog::all()]);
    }
}
