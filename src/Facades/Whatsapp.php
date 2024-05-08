<?php

namespace BlissJaspis\WhatsappCloudApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \BlissJaspis\WhatsappCloudApi\WhatsappRead readMessage()
 * @method static \BlissJaspis\WhatsappCloudApi\WhatsappMedia media()
 * @method static \BlissJaspis\WhatsappCloudApi\WhatsappMessage message()
 *
 * @see \BlissJaspis\WhatsappCloudApi\Whatsapp
 */
class Whatsapp extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Whatsapp';
    }
}
