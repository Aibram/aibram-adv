<?php


namespace App\Classes\CodeSender;

class WhatsappSender implements BaseSender
{
    protected $resp = ['100' => 'base.sms.success','300' => 'base.sms.fail'];
    protected $mobile;
    protected $title;
    protected $message;

    public function __construct($mobile,$title,$message)
    {
        $this->mobile = $mobile;
        $this->title = $title;
        $this->message = $message;
    }
    public function send(){
        return __($this->resp['100']);
    }

}
