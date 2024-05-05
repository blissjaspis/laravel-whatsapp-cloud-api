<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Exceptions\PhoneNumberIdNotFound;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class Whatsapp {

    protected Http $http;
    
    protected Collection $collection;

    public function __construct()
    {
        if (! config('whatsapp-cloud-api.bussiness_phone_number_id')) {
            throw new PhoneNumberIdNotFound("Bussiness phone number id not found.");
        }
        
        $this->http = Http::acceptJson()->withToken(config('whatsapp-cloud-api.access_token'))->timeout(30)->retry(3, 100);

        $this->collection = collect([
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
        ]);
    }

    protected function url(): string
    {
        $url = "https://graph.facebook.com";
        $version = config('whatsapp-cloud-api.version_sdk');
        $phoneNumberId = config('whatsapp-cloud-api.bussiness_phone_number_id');
        
        return $url .'/'. $version .'/'. $phoneNumberId . '/messages';
    }

    public function to(string $phoneNumber = ''): self
    {
        $cleanedNumber = str_replace('+', '', $phoneNumber);

        if (substr($cleanedNumber, 0, 2) === config('whatsapp-cloud-api.country_code')) {
            $this->collection->put('to', $phoneNumber);
        } else {
            $this->collection->put('to', config('whatsapp-cloud-api.country_code').$phoneNumber);
        }

        return $this;
    }

    public function body(array $data) : self
    {
        $this->collection = $this->collection->merge($data);

        return $this;
    }

    public function send()
    {
        return $this->http
            ->withBody(json_encode($this->collection), 'application/json')
            ->post($this->url());
    }
}