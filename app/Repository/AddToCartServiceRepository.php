<?php

namespace App\Repository;
use App\Repository\Interfaces\AddToCartServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddToCartServiceRepository implements AddToCartServiceInterface{

    public function setAddToCart($request){
        $userId = $request->user_id;
        $productId = $request->productId;
        $quatity = $request->quantity;

        $exists = DB::table('cart')
                        ->where('product_id',$productId)
                        ->where('user_id',$userId)
                        ->exists();

        if($exists){
            return[
                "status"=>400,
                "message"=>['product already added to the cart']
            ];
        }

        DB::table('cart')
                ->insert([
                    "user_id"=>$userId,
                    "product_id"=>$productId,
                    "quantity"=>$quatity,
                    "created_at"=>Carbon::now(),
                    "updated_at"=>Carbon::now()
                ]);

        return[
            "status"=>200,
            "message"=>['added to cart']
        ];
    }

    public function getCartCount($request){

        $count = DB::table('cart')
                ->where('user_id',Auth::id())
                ->where('record_status',1)
                ->count();
        return[
            "status"=>200,
            "cart_count" =>$count
        ];
    }

}
