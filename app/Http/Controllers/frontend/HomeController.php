<?php

namespace App\Http\Controllers\frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function forntendHomePage()
    {
        $categories = Category::all();
    //    dd($categories);
        echo view("frontend.home.index", compact('categories'));
    }
}
