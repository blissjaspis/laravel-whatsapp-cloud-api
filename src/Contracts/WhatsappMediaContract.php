<?php

namespace BlissJaspis\WhatsappCloudApi\Contracts;

use Illuminate\Http\Client\Response;

interface WhatsappMediaContract
{
    public function upload($file, string $type): Response;

    public function download(string $mediaUrl): Response;

    public function retrieve(string $mediaId): Response;

    public function delete(string $mediaId): Response;
}
