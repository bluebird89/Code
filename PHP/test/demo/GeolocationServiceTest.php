<?php


namespace Tests\demo;

use Application\model\GoogleMaps;
use Application\model\User;
use Application\services\GeolocationService;
use PHPUnit\Framework\TestCase;

class GeolocationServiceTest extends TestCase
{
    public function testProvidesLatitudeAndLongitudeForAnUser()
    {
        $coordinates = array('latitude' => '42N', 'longitude' => '12E');
        $googleMapsMock = $this->createMock(
            GoogleMaps::class
        );

        $googleMapsMock->expects($this->any())
            ->method('getLatitudeAndLongitude')
            ->will($this->returnValue($coordinates));

        $service = new GeolocationService($googleMapsMock);
        $user = new User;
        $user->location = 'Rome';
        $service->locate($user);
        $this->assertEquals('42N', $user->latitude);
        $this->assertEquals('12E', $user->longitude);
    }

    public function testProvidesLatitudeAndLongitudeForAnUserWithOnce()
    {

        $coordinates = array('latitude' => '42N', 'longitude' =>
            '12E');
        $googleMapsMock = $this->createMock(
            GoogleMaps::class
        );
        $googleMapsMock->expects($this->once())
            ->method('getLatitudeAndLongitude')
            ->with('Rome')
            ->will($this->returnValue($coordinates));

        $service = new GeolocationService($googleMapsMock);
        $user = new User;
        $user->location = 'Rome';
        $service->locate($user);
        $this->assertEquals('42N', $user->latitude);
        $this->assertEquals('12E', $user->longitude);
    }
}
