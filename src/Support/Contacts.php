<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

class Contacts implements Message
{
    protected array $components;
    
    public static function data($array)
    {
        $static = new static();

        $static->components = $array;
        
        return $static;
    }

    public function build(): array
    {
        return [
            "type" => "contacts",
            "contacts" => $this->components
        ];
    }
}