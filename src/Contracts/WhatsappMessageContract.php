<?php

namespace BlissJaspis\WhatsappCloudApi\Contracts;

use BlissJaspis\WhatsappCloudApi\WhatsappMessage;
use Illuminate\Http\Client\Response;

interface WhatsappMessageContract
{
    public function to(string $phoneNumber = '', $includeCountryCode = true): WhatsappMessage;

    public function body(array $data): WhatsappMessage;

    public function send(): Response;
}
