<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{public function list()
    {
      return view("backend.pages.orders.order detail");
    }
    public function orderList()
    {
      return view("backend.pages.orders.list");
    }
    public function see(Request $request){
      dd($request->all());
     }
}
