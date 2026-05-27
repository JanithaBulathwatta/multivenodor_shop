<?php
namespace App\Repository;

use App\Repository\Interfaces\BuyItemServiceInterface;
use App\Sms\SmsSender;
use Carbon\Carbon;
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
            "cusResult"=>$cusResults,
            "productResult"=>$productResult
        ];
    }

    public function setOrderDetails($request){

        $totalAmount = $request->totalAmpount;
        $shippingAddress = $request->shippingAddress;
        $shippingFee = $request->shippingFee;
        $productId = $request->productId;
        $quantity = $request->quantity;
        $unitPrice = $request->unitPrice;
        $mobile = $request->cusMobile;
        $cusName = $request->cusName;
        $paymentMethod = "COD";

        $orderId = DB::table('orders')->insertGetId([
            "user_id" => Auth::id(),
            "total_amount" => $totalAmount,
            "created_at"=>Carbon::now(),
            "updated_at" => Carbon::now(),
            "shipping_address" => $shippingAddress,
            "shipping_fee" => $shippingFee,
            "payment_method" => $paymentMethod
        ]);

        DB::table('order_items')->insert([
            "order_id"    => $orderId,
            "product_id"  => $productId,
            "quantity"    => $quantity,
            "unit_price"  => $unitPrice,
            "created_at"  => Carbon::now(),
            "updated_at"  => Carbon::now(),
        ]);

        //if the item in the cart, after buy it remove from the cart
        $isAvailableInCart = DB::table('cart')->where('user_id',Auth::id())->where('product_id',$productId)->exists();

        if($isAvailableInCart){
            DB::table('cart')
            ->where('user_id',Auth::id())
            ->where('product_id',$productId)
            ->update([
                "record_status"=>0,
                "updated_at"=>Carbon::now()
            ]);
        }

        //update product table - decrese stock quantity
        DB::table('products')
                ->where('id',$productId)
                ->decrement('stock_quantity',$quantity);


        // $message = "Dear ".$cusName." your order has been successfully placed.we will provide further informations";
        // SmsSender::sendSmsNotification($mobile,$message);

        return[
            "status"=>200,
            "message"=>"order sucessfull"
        ];

    }

}
