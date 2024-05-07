<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

class Text implements Message
{
    protected bool $linkPreview = true;

    protected string $defaultMessage;

    public static function message(string $message)
    {
        $static = new static();

        $static->defaultMessage = $message;

        return $static;
    }

    public function disableLinkPreview(): self
    {
        $this->linkPreview = false;

        return $this;
    }

    public function build(): array
    {
        return [
            'type' => 'text',
            'text' => [
                'preview_url' => $this->linkPreview,
                'body' => $this->defaultMessage,
            ],
        ];
    }
}
