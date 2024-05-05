<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

/**
 * Video only support extension .mp4 and .3gp
 * Max size 16 MB
 */
class Video implements Message
{
    protected string $defaultMediaIdOrUrl;

    protected string $defaultMediaSource = "asset";

    protected string $defaultCaption;
    
    // asset or url
    public static function media(string $mediaIdOrUrl, string $type = 'asset')
    {
        $static = new static();

        $static->defaultMediaIdOrUrl = $mediaIdOrUrl;
        $static->defaultMediaSource = $type === 'asset' ? 'asset' : 'url';
        
        return $static;
    }

    public function caption(string $caption)
    {
        $this->defaultCaption = $caption;

        return $this;
    }
    
    public function build() : array
    {
        return [
            "type" => "video",
            "video" => [
                $this->defaultMediaSource == 'asset' ? "id" : "link" => $this->defaultMediaIdOrUrl,
                'caption' => $this->defaultCaption ?? null
            ]
        ];
    }
}