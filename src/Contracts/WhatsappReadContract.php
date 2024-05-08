<?php

namespace BlissJaspis\WhatsappCloudApi\Contracts;

use Illuminate\Http\Client\Response;

interface WhatsappReadContract
{
    public function send(string $messageId): Response;
}
