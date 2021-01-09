<?php
return [
    'driver' => 'twilio',

    'from' => env('SMS_DEFAULT_FROM', 'null'),

    'twilio' => [
        'sid' => env('TWILIO_SID'),
        'token' => env('TWILIO_TOKEN'),
    ]
];