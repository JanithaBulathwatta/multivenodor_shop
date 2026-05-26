<?php
namespace App\Repository;

use App\Repository\Interfaces\BuyItemServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BuyItemServiceRepository implements BuyItemServiceInterface{


    public function getOrderItemDetails($request){
        $productId = $request->productId;
        $userId = Auth::id();

        $productResult = DB::table('products')
                        ->select('product_name','description','price','product_image')
                        ->where('id',$productId)
                        ->where('record_status',1)
                        ->get();

        $cusResults = DB::table('customer_details')
                    ->select('cus_name','mobile','address')
                    ->where('id',$userId)
                    ->where('record_status',1)
                    ->get();

        return[
            "status"=>200,
            "result"=>$cusResults
        ];
    }

}
