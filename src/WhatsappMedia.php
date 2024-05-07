<?php

namespace BlissJaspis\WhatsappCloudApi;

use Illuminate\Support\Facades\Http;

class WhatsappMedia
{
    public static function url()
    {
        $url = 'https://graph.facebook.com';
        $version = config('whatsapp-cloud-api.version_sdk');
        $phoneNumberId = config('whatsapp-cloud-api.bussiness_phone_number_id');

        return $url.'/'.$version.'/'.$phoneNumberId;
    }

    /**
     * All media files sent through this endpoint are encrypted and persist for 30 days,
     * unless they are deleted earlier.
     */
    public static function upload($file, string $type)
    {
        return Http::withToken(config('whatsapp-cloud-api.access_token'))
            ->timeout(30)->retry(3, 100)
            ->asMultipart()
            // ->attach('file', file_get_contents($file), $type)
            ->post(static::url().'/media', [
                'file' => fopen($file, 'r'),
                'type' => $type,
                'messaging_product' => 'whatsapp',
            ]);
    }

    public static function download(string $mediaUrl)
    {
        return Http::withToken(config('whatsapp-cloud-api.access_token'))->timeout(30)->retry(3, 100)->get($mediaUrl);
    }

    public static function retrieve(string $mediaId)
    {
        return Http::withToken(config('whatsapp-cloud-api.access_token'))
            ->timeout(30)->retry(3, 100)
            ->get(static::url().'/'.$mediaId);
    }

    public static function delete(string $mediaId)
    {
        return Http::withToken(config('whatsapp-cloud-api.access_token'))
            ->timeout(30)->retry(3, 100)
            ->delete(static::url().'/'.$mediaId);
    }
}
