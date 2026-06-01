<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderApiController extends Controller
{
    public function getPendingOrderDetails()
    {

        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('customer_details', 'users.id', '=', 'customer_details.user_id')
            ->select(
                'orders.*',
                'customer_details.cus_name as customer_name',
                'customer_details.mobile as customer_phone',
                'customer_details.address as customer_address'
            )
            ->where('orders.order_status', '=', 'pending')
            ->get();

        return response()->json([
            'success' => true,
            'status_code' => 200,
            'message' => 'Pending orders fetched successfully.',
            'data' => $orders
        ], 200);
    }

    public function markAsDelivered($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found!'], 404);
        }
        DB::table('orders')
            ->where('id', $id)
            ->update(['order_status' => 'delivered']);

        return response()->json(['message' => 'Order marked as delivered successfully!']);
    }
}
