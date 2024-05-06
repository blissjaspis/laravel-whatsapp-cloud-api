<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

class Interactive implements Message
{
    public function build(): array
    {
        return [
            "type" => "interactive",
            "interactive" => [
                "type" => "list"
            ]
        ];
    }
}