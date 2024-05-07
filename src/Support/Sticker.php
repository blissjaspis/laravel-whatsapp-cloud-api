<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

/**
 * Supported sticker format only .webp
 *
 * Animated sticker max size 500 KB
 * Static sticker max 100 KB
 */
class Sticker implements Message
{
    public string $mediaIdOrUrl;

    public static function media(string $media)
    {
        $static = new static();

        $static->mediaIdOrUrl = $media;

        return $static;
    }

    public function build(): array
    {
        return [
            'type' => 'sticker',
            'sticker' => [
                'id' => $this->mediaIdOrUrl,
            ],
        ];
    }
}
