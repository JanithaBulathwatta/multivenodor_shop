<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function loadOrders(){
        return view('pages.orders');
    }

    public function getOrderDetails(Request $request){
        $response = OrderService::getOrderDetails($request);
        return response()->json( $response);
    }
}
