<?php


namespace Application\model;

class GoogleMaps
{
    public function getLatitudeAndLongitude($location)
    {
        // some obscure network code to contact maps.google.com
        // ...
        $someValue = '35N';
        $someOtherValue = '40E';
        return array('latitude' => $someValue, 'longitude' =>
            $someOtherValue);
    }
}
