<?php

namespace BlissJaspis\WhatsappCloudApi\Facades;

use Illuminate\Support\Facades\Facade;

class Whatsapp extends Facade {
    protected static function getFacadeAccessor() : string
    {
        return \BlissJaspis\WhatsappCloudApi\Whatsapp::class;
    }
}