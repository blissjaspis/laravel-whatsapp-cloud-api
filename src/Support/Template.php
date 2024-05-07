<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;
use BlissJaspis\WhatsappCloudApi\Exceptions\TemplateComponentsEmpty;

class Template implements Message
{
    protected string $defaultName;

    protected string $defaultLang = 'en';

    protected array $defaultComponents = [];

    public static function name(string $name)
    {
        $static = new static();

        $static->defaultName = $name;

        return $static;
    }

    public function lang(string $lang)
    {
        $this->defaultLang = $lang;

        return $this;
    }

    public function components(array $data)
    {
        $this->defaultComponents = $data;

        return $this;
    }

    private function checkIfComponentNotEmpty() : void
    {
        if (empty($this->defaultComponents)) {
            throw new TemplateComponentsEmpty("Template components empty");
        }
    }

    public function build(): array
    {
        $this->checkIfComponentNotEmpty();
        
        return [
            'type' => 'template',
            'template' => [
                'name' => $this->defaultName,
                'language' => [
                    'code' => $this->defaultLang,
                ],
                'components' => $this->defaultComponents,
            ],
        ];
    }
}
