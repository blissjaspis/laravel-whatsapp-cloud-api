<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Exceptions\PhoneNumberIdNotFound;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class HttpProcess
{
    public function __construct()
    {
        if (! config('whatsapp-cloud-api.bussiness_phone_number_id')) {
            throw new PhoneNumberIdNotFound('Bussiness phone number id not found.');
        }
    }

    public function http(bool $usingPhoneNumber = true): PendingRequest
    {
        $root = 'https://graph.facebook.com';
        $version = config('whatsapp-cloud-api.version_sdk');
        $phoneNumberId = config('whatsapp-cloud-api.bussiness_phone_number_id');

        $apiUrl = $usingPhoneNumber ? "{$root}/{$version}/{$phoneNumberId}" : "{$root}/{$version}";

        return Http::baseUrl($apiUrl)->withToken(config('whatsapp-cloud-api.access_token'))->retry(3, 300);
    }
}
