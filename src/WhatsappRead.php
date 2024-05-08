<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Contracts\WhatsappReadContract;
use Illuminate\Http\Client\Response;

/**
 * We recommend marking incoming messages as read within 30 days of receipt.
 */
class WhatsappRead extends HttpProcess implements WhatsappReadContract
{
    public function send(string $messageId): Response
    {
        $collection = collect([
            'messaging_product' => 'whatsapp',
            'status' => 'read',
            'message_id' => $messageId,
        ]);

        return $this->http()->acceptJson()->withBody($collection->toJson())->post('/messages');
    }
}
