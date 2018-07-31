<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAQaoVYsQ:APA91bHsXFRI8aAd5ZJQ0vGcOsGc6B-N21maxe2BTOaZcisyuziMXclqmviETaZ3b4BJD_IJ3lhgWyJR7HHmknf7QqpY4wU0WOfObUfR95ljHcDf6VPLc6EDYBM_OK460c_Rzh9JCCWRGJ21G9kQDQoe8MolmlYrMw'),
        'sender_id' => env('FCM_SENDER_ID', '282026402500'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
