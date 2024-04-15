<?php

return [
    'key' => env('SPARROW_SMS_KEY'),
    'secret' => env('SPARROW_SMS_SECRET'),
    'base_url' => env('SPARROW_SMS_BASE_URL', 'https://api.sparrowsms.com/v2/sms/'),
    'from'=>env('SPARROW_SMS_FROM','Studify')
];