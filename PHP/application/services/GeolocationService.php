<?php


namespace Application\services;

use Application\model\GoogleMaps;
use Application\model\User;

class GeolocationService
{
    private $_maps;

    public function __construct(GoogleMaps $maps)
    {
        $this->_maps = $maps;
    }

    public function locate(User $user)
    {
        $location = $user->location;
        if ($location === null) {
            $location = 'Milan';
        }
        $coordinates = $this->_maps->getLatitudeAndLongitude($location);
        $user->latitude = $coordinates['latitude'];
        $user->longitude = $coordinates['longitude'];
    }
}
