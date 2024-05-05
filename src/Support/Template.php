<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

class Template
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
    
    public function build() : array
    {
        return [
            "type" => "template",
            "template" => [
                "name" => $this->defaultName,
                "language" => [
                    "code" => $this->defaultLang
                ],
                "components" => $this->defaultComponents
            ]
        ];
    }
}