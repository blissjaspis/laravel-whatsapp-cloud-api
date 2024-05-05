<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

class Text
{
    protected bool $linkPreview = false;

    protected string $defaultMessage;
    
    public static function message(string $message) : self
    {
        $static = new static;

        $static->defaultMessage = $message;
        
        return $static;
    }
    
    public function enableLinkPreview()
    {
        $this->linkPreview = true;
        
        return $this;
    }
    
    public function build()
    {
        return [
            "text" => [
                "preview_url" => $this->linkPreview,
                "body" => $this->defaultMessage
            ]
        ];
    }
}