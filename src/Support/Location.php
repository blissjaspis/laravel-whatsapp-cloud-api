<?php

namespace BlissJaspis\WhatsappCloudApi\Support;

use BlissJaspis\WhatsappCloudApi\Contracts\Message;

class Location implements Message
{
    protected string $defaultName;

    protected string $defaultAddress;

    protected string $defaultLatitude;

    protected string $defaultLongitude;
    
    public static function mark()
    {
        return new static();
    }

    public function latitude(string $latitude) : self
    {
        $this->defaultLatitude = $latitude;
        
        return $this;
    }

    public function longitude(string $longitude) : self
    {
        $this->defaultLongitude = $longitude;
        
        return $this;
    }

    public function name(string $name) : self
    {
        $this->defaultName = $name;
        
        return $this;
    }

    public function address(string $address) : self
    {
        $this->defaultAddress = $address;
        
        return $this;
    }
    
    public function build() : array
    {   
        return [
            "type" => "location",
            "location" => [
                "latitude" => $this->defaultLatitude,
                "longitude" => $this->defaultLongitude,
                "name" => $this->defaultName ?? null,
                "address" => $this->defaultAddress ?? null,
            ]
        ];
    }
}