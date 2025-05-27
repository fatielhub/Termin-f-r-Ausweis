<?php

namespace App\Http\Controllers;

use App\Services\SmsService;

class sendSms extends Controller
{
    protected $sms;

    public function __construct(SmsService $sms)
    {
        $this->sms = $sms;
    }

    public function send()
    {
        $to = '212711306550';
        $text = 'A text message sent using the Nexmo SMS API';

        $status = $this->sms->sendSms($to, $text);

        return response()->json(['status' => $status]);
    }
}

