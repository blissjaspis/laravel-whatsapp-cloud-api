<?php

namespace BlissJaspis\WhatsappCloudApi;

use BlissJaspis\WhatsappCloudApi\Contracts\WhatsappMediaContract;
use Illuminate\Http\Client\Response;

class WhatsappMedia extends HttpProcess implements WhatsappMediaContract
{
    /**
     * All media files sent through this endpoint are encrypted and persist for 30 days,
     * unless they are deleted earlier.
     */
    public function upload($file, string $type): Response
    {
        return $this->http()->asMultipart()
            // ->attach('file', file_get_contents($file), $type)
            ->post('/media', [
                'file' => fopen($file, 'r'),
                'type' => $type,
                'messaging_product' => 'whatsapp',
            ]);
    }

    public function download(string $mediaUrl): Response
    {
        return $this->http(false)->get($mediaUrl);
    }

    public function retrieve(string $mediaId): Response
    {
        return $this->http(false)->get("/{$mediaId}");
    }

    public function delete(string $mediaId): Response
    {
        return $this->http(false)->delete("/{$mediaId}");
    }
}
