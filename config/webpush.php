<?php


return [
    'vapid' => [
        'subject' => 'mailto:your-email@example.com',
        'public_key' => env('VAPID_PUBLIC_KEY'),
        'private_key' => env('VAPID_PRIVATE_KEY'),
    ],
    // Autres configurations...
];
