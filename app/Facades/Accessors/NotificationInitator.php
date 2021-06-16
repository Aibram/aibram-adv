<?php

namespace App\Facades\Accessors;

use App\Facades\FirebasePush;
use Illuminate\Support\Facades\Notification;

class NotificationInitator
{
    public function init($model,$type,$title,$user,$class) {
        $this->save($model,$type,$title,$user,$class);
        $this->send($title,$user);
    }
    public function save($model,$type,$title,$user,$class) {
        $notificationArray = $model->toArray();
        $notificationArray['notification_title'] = $title;
        $notificationArray['notification_type'] = $type;
        Notification::send($user, new $class($notificationArray));
        
    }
    public function send($title,$user) {
        FirebasePush::push($title,$title,$user->firebase_token);
    }
}