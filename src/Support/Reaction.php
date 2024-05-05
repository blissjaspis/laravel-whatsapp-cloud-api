<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

class Reaction implements Message
{
    protected string $defaultMessageId;

	// example to default emoji 😀
    protected string $defaultEmoji = "\uD83D\uDE00";
    
    public static function messageId(string $messageId)
    {
        $static = new static;

        $static->defaultMessageId = $messageId;
        
        return $static;
    }

    public function emoji(string $emoji = '') : self
    {
        if ($emoji) {
            $this->defaultEmoji = $emoji;
        }
        
        return $this;
    }
    
    public function build() : array
    {
        return [
            "type" => "reaction",
            "reaction" => [
                "message_id" => $this->defaultMessageId,
                "emoji" => $this->defaultEmoji
            ]
        ];
    }
}