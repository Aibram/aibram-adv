<?php

namespace App\Facades\Accessors;

use App\Classes\CodeSender\SMSSender;
use App\Classes\CodeSender\WhatsappSender;

class CodeSender
{
    public function sendMessage($provider,$mobile,$title,$message) {
        if($provider=="sms"){
            $sender = new SMSSender($mobile,$title,$message);
        }
        else{
            $sender = new WhatsappSender($mobile,$title,$message);
        }
        return $sender->send();
    }
}