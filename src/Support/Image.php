<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

class Image implements Message
{
    protected string $defaultMediaIdOrUrl;

    protected string $defaultMediaSource = "asset";

    protected string $defaultCaption = "Image";
    
    // asset or url
    public static function media(string $mediaIdOrUrl, string $type = 'asset')
    {
        $static = new static();

        $static->defaultMediaIdOrUrl = $mediaIdOrUrl;
        $static->defaultMediaSource = $type === 'asset' ? 'asset' : 'url';
        
        return $static;
    }

    public function caption(string $caption = '') : self
    {
        $this->defaultCaption = $caption ?? $this->defaultCaption;
        
        return $this;
    }
    
    public function build() : array
    {   
        return [
            "type" => "image",
            "image" => [
                $this->defaultMediaSource == 'asset' ? "id" : "link" => $this->defaultMediaIdOrUrl,
                "caption" => $this->defaultCaption,
            ]
        ];
    }
}