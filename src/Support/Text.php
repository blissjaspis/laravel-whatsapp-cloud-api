<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

class Text implements Message
{
    protected bool $linkPreview = false;

    protected string $defaultMessage;
    
    public static function message(string $message)
    {
        $static = new static;

        $static->defaultMessage = $message;
        
        return $static;
    }
    
    public function enableLinkPreview() : self
    {
        $this->linkPreview = true;
        
        return $this;
    }
    
    public function build() : array
    {
        return [
            "type" => "text",
            "text" => [
                "preview_url" => $this->linkPreview,
                "body" => $this->defaultMessage
            ]
        ];
    }
}