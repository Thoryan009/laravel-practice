<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoreDataController extends Controller
{
    public function index()
    {
        return view('moreData');
    }

    public function another()
    {
        return view('anotherData');
    }
}
