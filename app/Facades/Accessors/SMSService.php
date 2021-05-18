<?php

namespace App\Facades\Accessors;


class SMSService
{
    public function sendMessage($number,$meesage,$title) {
        $title = $title ?? SMSConst::TITLE;
        return SMSConst::RESP['100'];
    }
}