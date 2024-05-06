<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\HttpRepository;
use BlissJaspis\WhatsappCloudApi\HttpProcess;
use Illuminate\Support\Collection;

/**
 * We recommend marking incoming messages as read within 30 days of receipt.
 */
class Read extends HttpProcess implements HttpRepository
{
    public Collection $collection;
    
    public static function build(string $messageId) : self
    {
        $static = new static();
        
        $static->collection = collect([
            "messaging_product" => "whatsapp",
            "status" => "read",
            "message_id" => $messageId
        ]);

        return $static;
    }

    public function send()
    {
        return $this->http
            ->withBody(json_encode($this->collection), 'application/json')
            ->post($this->url());
    }
}