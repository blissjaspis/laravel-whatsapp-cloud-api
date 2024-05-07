<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

/**
 * @method static message(string $message)
 * @method $this disableLinkPreview()
 * @method array build()
 */
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
