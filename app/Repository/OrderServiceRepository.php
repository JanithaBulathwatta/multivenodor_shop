<?php
namespace App\Repository;
use App\Repository\Interfaces\OrderServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderServiceRepository implements OrderServiceInterface{

    public function getOrderDetails($request){
        $userId = Auth::id();
        $sql = "select p.product_name,
                       p.price,
                       p.product_image,
                       ord.order_status,
                       ord.shipping_fee,
                       ord.shipping_address,
                       ord.payment_method
                       from products p
                       inner join order_items oi on oi.product_id = p.id
                       inner join orders ord on ord.id = oi.order_id
                       where p.record_status = 1
                       and ord.record_status = 1
                       and oi.record_status = 1
                       and ord.user_id = '$userId'";

        $result = DB::select($sql);

        dd($result);
    }

}
