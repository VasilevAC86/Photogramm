<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService{

    static function Send($user_id, $msg){
        Notification::create([
            'user_id' => $user_id,
            'message' => $msg
        ]);
    }
}