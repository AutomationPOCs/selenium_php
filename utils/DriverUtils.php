<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;

require_once('vendor/autoload.php');

class DriverUtils
{
    private static $driver;

    public static function getDriver()
    {
        if (!isset(self::$driver)) {
            $host = 'http://localhost:4444/wd/hub'; // Change to your Selenium server address
            $capabilities = DesiredCapabilities::chrome();
            self::$driver = RemoteWebDriver::create($host, $capabilities);
        }

        return self::$driver;
    }

    public static function quitDriver()
    {
        if (isset(self::$driver)) {
            self::$driver->quit();
            self::$driver = null;
        }
    }
}
