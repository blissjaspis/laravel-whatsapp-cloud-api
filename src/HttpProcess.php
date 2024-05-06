<?php

namespace BlissJaspis\WhatsappCloudApi;

use Illuminate\Support\Facades\Http;

class HttpProcess
{
    protected Http $http;

    public function __construct()
    {
        $this->http = Http::acceptJson()->withToken(config('whatsapp-cloud-api.access_token'))->timeout(30)->retry(3, 100);
    }

    protected function url(): string
    {
        $url = "https://graph.facebook.com";
        $version = config('whatsapp-cloud-api.version_sdk');
        $phoneNumberId = config('whatsapp-cloud-api.bussiness_phone_number_id');
        
        return $url .'/'. $version .'/'. $phoneNumberId . '/messages';
    }
}