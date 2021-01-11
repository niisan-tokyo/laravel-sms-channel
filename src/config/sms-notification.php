<?php
return [
    'driver' => 'twilio',

    'default_from' => env('SMS_DEFAULT_FROM', 'null'),

    'twilio' => [
        'sid' => env('TWILIO_SID'),
        'token' => env('TWILIO_TOKEN'),
    ]
];