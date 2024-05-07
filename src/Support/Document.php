<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

/**
 * Document only support extension .txt, .xls, .xlsx, .doc, docx, .ppt, pptx, and .pdf
 *
 * Max size 100 MB
 */
class Document implements Message
{
    protected string $defaultMediaIdOrUrl;

    protected string $defaultMediaSource = 'asset';

    protected string $defaultCaption = 'Document';

    protected string $defaultFilename = 'document.pdf';

    // asset or url
    public static function media(string $mediaIdOrUrl, string $type = 'asset')
    {
        $static = new static();

        $static->defaultMediaIdOrUrl = $mediaIdOrUrl;
        $static->defaultMediaSource = $type === 'asset' ? 'asset' : 'url';

        return $static;
    }

    public function caption(string $caption = ''): self
    {
        $this->defaultCaption = $caption ?? $this->defaultCaption;

        return $this;
    }

    public function filename(string $filename = ''): self
    {
        $this->defaultFilename = $filename ?? $this->defaultFilename;

        return $this;
    }

    public function build(): array
    {
        return [
            'type' => 'document',
            'document' => [
                $this->defaultMediaSource == 'asset' ? 'id' : 'link' => $this->defaultMediaIdOrUrl,
                'caption' => $this->defaultCaption,
                'filename' => $this->defaultFilename,
            ],
        ];
    }
}
