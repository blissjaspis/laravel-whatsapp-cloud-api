<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

/**
 * Audio only support extension .aac, .amr, .mp3, m4a and .ogg
 * Max size 16 MB
 */
class Audio
{
    protected string $defaultMediaIdOrUrl;

    protected string $defaultMediaSource = "asset";
    
    // asset or url
    public static function media(string $mediaIdOrUrl, string $type = 'asset')
    {
        $static = new static();

        $static->defaultMediaIdOrUrl = $mediaIdOrUrl;
        $static->defaultMediaSource = $type === 'asset' ? 'asset' : 'url';
        
        return $static;
    }
    
    public function build() : array
    {
        return [
            "type" => "audio",
            "audio" => [
                $this->defaultMediaSource == 'asset' ? "id" : "link" => $this->defaultMediaIdOrUrl,
            ]
        ];
    }
}