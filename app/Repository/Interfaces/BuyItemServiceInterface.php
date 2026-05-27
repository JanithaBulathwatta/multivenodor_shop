<?php
namespace App\Repository\Interfaces;

interface BuyItemServiceInterface{

    public function getOrderItemDetails($request);
    public function setOrderDetails($request);

}
