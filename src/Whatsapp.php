<?php

namespace BlissJaspis\WhatsappCloudApi;

use Illuminate\Http\Client\Response;

class Whatsapp
{
    public function readMessage(string $messageId): Response
    {
        return (new WhatsappRead())->send($messageId);
    }

    public function media()
    {
        return new WhatsappMedia;
    }

    public function message()
    {
        return new WhatsappMessage;
    }
}
