<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function list()
  {
    return view("backend.pages.payments.payment");
  }
    public function paymentList()
  {
    return view("backend.pages.payments.list");
  }
  public function see(Request $request){
    dd($request->all());
   }
}
