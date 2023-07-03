<?php

return [
    'mercant_id' => env('MIDTRANS_IS_PROD') ? env('MIDTRANS_PROD_MERCHAT_ID') : env('MIDTRANS_SB_MERCHAT_ID'),
    'client_key' => env('MIDTRANS_IS_PROD') ? env('MIDTRANS_PROD_CLIENT_KEY') : env('MIDTRANS_SB_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_IS_PROD') ? env('MIDTRANS_PROD_SERVER_KEY') : env('MIDTRANS_SB_SERVER_KEY'),

    'is_production' => env('MIDTRANS_IS_PROD', false),
    'is_sanitized' => false,
    'is_3ds' => false,
];