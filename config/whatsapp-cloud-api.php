<?php

return [
    /**
     * WhatsApp version API you want to use.
     */
    'version_sdk' => env('WHATSAPP_VERSION_SDK', 'v19.0'),
    
    /**
     * Whatsapp bussiness phone number ID
     */
    'bussiness_phone_number_id' => env('WHATSAPP_PHONE_NUMBER_ID', ''),

    /**
     * System User Access Tokens
     * To get this token you must create a system user and generate the token access
     */
    'access_token' => env('WHATSAPP_ACCESS_TOKEN', ''),

    /**
     * The country code you use on WhatsApp
     */
    'country_code' => env('WHATSAPP_COUNTRY_CODE', '+62')
];