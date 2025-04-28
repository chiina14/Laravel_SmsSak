<?php

return [
    'send_otp_url' => env('SEND_OTP_URL', 'https://sendotp-47lvvvrp4a-uc.a.run.app'),
    'verify_otp_url' => env('VERIFY_OTP_URL', 'https://verifyotp-47lvvvrp4a-uc.a.run.app'),
    'api_key' => env('SMS_SAK_API_KEY'),
    'project_id' => env('SMS_SAK_PROJECT_ID'),
    'country' => env('SMS_SAK_COUNTRY', 'dz'),
];
