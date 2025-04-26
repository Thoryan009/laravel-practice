<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Exception;


use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
 

       $my_blogs = Blog::where('user_id', Auth::user()->id);
        // $count = Blog::count();
        return view('admin.dashboard.index', [
            'count' =>  Blog::count(),
            'user' => Auth::user()->count(),
            'my_blogs' => $my_blogs->count()
        ]);
    }

    public function login()
    {
        return view('admin.login.index');
    }
}
