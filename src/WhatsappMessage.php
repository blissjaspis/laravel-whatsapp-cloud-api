<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Contracts\WhatsappMessageContract;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class WhatsappMessage extends HttpProcess implements WhatsappMessageContract
{
    public Collection $collection;

    public function __construct()
    {
        parent::__construct();

        $this->collection = collect([
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
        ]);
    }

    public function to(string $phoneNumber = '', $includeCountryCode = true): WhatsappMessage
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

    public function body(array $data): WhatsappMessage
    {
        $this->collection = $this->collection->merge($data);

        return $this;
    }

    public function send(): Response
    {
        return $this->http()->acceptJson()->withBody($this->collection->toJson())->post('/messages');
    }
}
