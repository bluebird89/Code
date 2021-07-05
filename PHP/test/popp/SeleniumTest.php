<?php

namespace Tests;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Facebook\WebDriver\WebDriverBy;
use PHPUnit\Framework\TestCase;

class SeleniumTest extends TestCase
{
    private $driver;
    private $wd;

    protected function setUp(): void
    {
        $host = "http://127.0.0.1:4444";
        $capabilities = [WebDriverCapabilityType::BROWSER_NAME => 'firefox'];
        $this->driver = RemoteWebDriver::create($host, $capabilities);
    }

    public function testAddVenue()
    {
    }

    public function testShouldContainSearchInput()
    {
        $capabilities = [WebDriverCapabilityType::BROWSER_NAME => 'firefox'];

        $this->wd = RemoteWebDriver::create('https://www.w3.org/', $capabilities);
        // Load the URL (will wait until page is loaded)
//      $this->wd->get('http://www.w3.org/'); // $this->wd holds instance of \RemoteWebDriver

        // Do some assertion
        $this->assertContains('W3C', $this->wd->getTitle());

        // You can use $this->log(), $this->warn() or $this->debug() with sprintf-like syntax
//      $this->log('Current page "%s" has title "%s"', $this->wd->getCurrentURL(), $this->wd->getTitle());

        // Make sure search input is present
        $searchInput = $this->wd->findElement(WebDriverBy::cssSelector('#search-form input'));
        // Or you can use syntax sugar provided by Steward (this is equivalent of previous line)
//      $searchInput = $this->findByCss('#search-form input');

        // Assert title of the search input
        $this->assertEquals('Search', $searchInput->getAttribute('title'));
    }
}
