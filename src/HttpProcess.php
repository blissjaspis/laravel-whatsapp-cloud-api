<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Exceptions\PhoneNumberIdNotFound;

class HttpProcess
{
    public function __construct()
    {
        if (! config('whatsapp-cloud-api.bussiness_phone_number_id')) {
            throw new PhoneNumberIdNotFound("Bussiness phone number id not found.");
        }
    }
    
    protected function url(): string
    {
        $url = "https://graph.facebook.com";
        $version = config('whatsapp-cloud-api.version_sdk');
        $phoneNumberId = config('whatsapp-cloud-api.bussiness_phone_number_id');
        
        return $url .'/'. $version .'/'. $phoneNumberId . '/messages';
    }
}