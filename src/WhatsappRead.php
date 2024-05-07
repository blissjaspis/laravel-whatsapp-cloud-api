<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Contracts\HttpRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

/**
 * We recommend marking incoming messages as read within 30 days of receipt.
 */
class WhatsappRead extends HttpProcess implements HttpRepository
{
    public Collection $collection;

    public static function message(string $messageId): self
    {
        $static = new static();

        $static->collection = collect([
            'messaging_product' => 'whatsapp',
            'status' => 'read',
            'message_id' => $messageId,
        ]);

        return $static;
    }

    public function send()
    {
        return $this->collection;

        return Http::acceptJson()->withToken(config('whatsapp-cloud-api.access_token'))
            ->timeout(30)->retry(3, 100)
            ->withBody(json_encode($this->collection), 'application/json')
            ->post($this->url());
    }
}
