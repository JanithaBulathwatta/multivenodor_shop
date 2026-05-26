<?php

namespace App\Http\Controllers;

use App\Services\BuyItemService;
use Illuminate\Http\Request;

class BuyItemController extends Controller
{
    public function loadBuyItem(){
        return view('pages.buy-item');
    }

    public function getOrderItemDetails(Request $request){
        $response = BuyItemService::getOrderItemDetails($request);
        return response()->json($response);
    }
}
