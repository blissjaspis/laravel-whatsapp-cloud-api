<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Contracts\HttpRepository;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class Whatsapp extends HttpProcess implements HttpRepository
{
    protected Collection $collection;

    public function __construct()
    {
        parent::__construct();

        $this->collection = collect([
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
        ]);
    }

    public function to(string $phoneNumber = '', $includeCountryCode = true): self
    {
        if ($includeCountryCode) {
            $phoneNumber = Str::of($phoneNumber)
                ->whenStartsWith('0', function (Stringable $string) {
                    return $string->replaceStart('0', '')->prepend(config('whatsapp-cloud-api.country_code'));
                })->toString();
        }

        $this->collection->put('to', $phoneNumber);

        return $this;
    }

    public function body(array $data): self
    {
        $this->collection = $this->collection->merge($data);

        return $this;
    }

    public function send() : Response
    {
        $response = Http::acceptJson()->withToken(config('whatsapp-cloud-api.access_token'))
            ->timeout(30)->retry(3, 100)
            ->withBody($this->collection->toJson(), 'application/json')
            ->post($this->url());

        return $response;
    }
}
