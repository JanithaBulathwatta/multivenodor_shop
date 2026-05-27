<?php

namespace App\Http\Controllers;

use App\Services\BuyItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyItemController extends Controller
{
    public function loadBuyItem(){

        $isAvailable = DB::table('customer_details')->where('user_id',Auth::id())->exists();
        if(!$isAvailable){
            return redirect()->route('customer.show');
        }
        return view('pages.buy-item');
    }

    public function getOrderItemDetails(Request $request){
        $response = BuyItemService::getOrderItemDetails($request);
        return response()->json($response);
    }

    public function setOrderDetails(Request $request){
        $response = BuyItemService::setOrderDetails($request);
        return response()->json($response);
    }

}
