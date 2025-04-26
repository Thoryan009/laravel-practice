<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SumController extends Controller
{
    public function sum(Request $request)
    {
        $num1 = $request->num1;
        $num2 = $request->num2;
        $sum = $num1  +  $num2;
        return  'The sum is : '.$sum;
    }
}
