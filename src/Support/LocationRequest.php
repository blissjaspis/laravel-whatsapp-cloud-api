<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

class LocationRequest implements Message
{
    protected string $defaultMessage;

    public static function message(string $message): self
    {
        $static = new static();

        $static->defaultMessage = $message;

        return $static;
    }

    public function build(): array
    {
        return [
            'type' => 'interactive',
            'interactive' => [
                'type' => 'location_request_message',
                'body' => [
                    'text' => $this->defaultMessage,
                ],
                'action' => [
                    'name' => 'send_location',
                ],
            ],
        ];
    }
}
