<?php

namespace App\Repository;
use App\Repository\Interfaces\CustomerServiceInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerServiceRepository implements CustomerServiceInterface{

    public function setCustomerDetails($request){
        $cus_name = $request->name;
        $cus_address = $request->address;
        $cus_mobile = $request->mobile;
        $cus_country = $request->country;
        $cus_postal = $request->postalCode;

        $isavailable = DB::table('customer_details')
                            ->where('user_id',Auth::id())
                            ->where('record_status',1)
                            ->exists();

        if($isavailable){
            return[
                "status"=>400,
                "message"=>['you have already insert your details']
            ];
        }

        DB::table('customer_details')
                ->insert([
                    "cus_name"=>$cus_name,
                    "mobile"=>$cus_mobile,
                    "address"=>$cus_address,
                    "country"=>$cus_country,
                    "postal_code"=>$cus_postal,
                    "user_id"=>Auth::id(),
                    "created_at"=>Carbon::now(),
                ]);

        return[
            "status"=>400,
            "message"=>['you have already insert your details']
        ];

    }

}
