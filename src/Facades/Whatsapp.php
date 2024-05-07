<?php

namespace BlissJaspis\WhatsappCloudApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \BlissJaspis\WhatsappCloudApi\Whatsapp to(string $phoneNumber = '', $includeCountryCode = true)
 * @method static \BlissJaspis\WhatsappCloudApi\Whatsapp body(array $data)
 * @method static \Illuminate\Http\Client\Response send()
 *
 * @see \BlissJaspis\WhatsappCloudApi\Whatsapp
 */
class Whatsapp extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BlissJaspis\WhatsappCloudApi\Whatsapp::class;
    }
}
