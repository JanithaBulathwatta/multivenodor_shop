<?php

namespace App\Services;

use App\Repository\Interfaces\OrderServiceInterface;

class OrderService{

    public static function getOrderDetails($request){
        $result = app()->make(OrderServiceInterface::class)->getOrderDetails($request);
        return $result;
    }

}
