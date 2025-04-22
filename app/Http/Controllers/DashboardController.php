<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        // $count = Blog::count();
        return view('admin.dashboard.index', [
            'count' =>  Blog::count(),
            'user' => Auth::user()::count(),
        ]);
    }

    public function login()
    {
        return view('admin.login.index');
    }
}
