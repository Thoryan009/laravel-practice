<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $count = Blog::count();
        return view('admin.dashboard.index', ['count' =>  Blog::count()]);
    }
}
