<?php

namespace App\Services;

use App\Contracts\SmsContract;
use Illuminate\Support\Facades\Log;

class SmsService implements SmsContract
{
    /**
     * send sms
     * @param $mobile
     * @param $message
     * @return bool
     */
    public function send($mobile, $message): bool
    {
        Log::info("To: $mobile \n $message");
        return true;
    }
}
