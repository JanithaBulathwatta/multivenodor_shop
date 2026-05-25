<?php

namespace App\Sms;

use Illuminate\Support\Facades\Http;

class SmsSender{
    public static function sendSmsNotification($mobileNumber, $message)
    {
        if (str_starts_with($mobileNumber, '0')) {
            $mobileNumber = '94' . substr($mobileNumber, 1);
        }

        $response = Http::get('https://app.notify.lk/api/v1/send', [
            'user_id'   => env('NOTIFY_USER_ID'),
            'api_key'   => env('NOTIFY_API_KEY'),
            'sender_id' => env('NOTIFY_SENDER_ID'),
            'to'        => $mobileNumber,
            'message'   => $message
        ]);

        return $response->successful();
    }
}
