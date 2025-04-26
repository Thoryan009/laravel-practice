<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements BlogRepositoryInterface
{
    public function all()
    {
        return Blog::latest()->get();
    }

    public function create($request,  $id)
    {
        return Blog::newBlog($request,  $id);
    }

    public function show($id)
    {
        return Blog::find($id);   
    }

    public function update($request, $id)
    {
        return Blog::updateBlog($request, $id);
    }

    public function delete( $id)
    {
        return Blog::deleteBlog( $id);
    }
    
    public function userBlogs()
    {
       return Blog::where('user_id', Auth::user()->id)->get();
    }
}