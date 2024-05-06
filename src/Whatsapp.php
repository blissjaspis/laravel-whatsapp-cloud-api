<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Contracts\HttpRepository;
use BlissJaspis\WhatsappCloudApi\Exceptions\PhoneNumberIdNotFound;
use Illuminate\Support\Collection;

class Whatsapp extends HttpProcess implements HttpRepository
{
    protected Collection $collection;

    public function __construct()
    {
        parent::__construct();
        
        if (! config('whatsapp-cloud-api.bussiness_phone_number_id')) {
            throw new PhoneNumberIdNotFound("Bussiness phone number id not found.");
        }

        $this->collection = collect([
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
        ]);
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