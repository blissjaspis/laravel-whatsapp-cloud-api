<?php

namespace BlissJaspis\WhatsappCloudApi;

class Whatsapp
{
    public function readMessage(string $messageId)
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
