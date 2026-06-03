<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function loadOrders(){
        return view('pages.orders');
    }

    public function getOrderDetails(Request $request){
        
    }
}
