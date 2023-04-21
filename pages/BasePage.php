<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;

class BasePage {

private $url = 'https://www.saucedemo.com/';
private $driver;

public function __construct(RemoteWebDriver $driver)
{
    $this->driver = $driver;
}

public function openURL(){
    $this->driver->get($this->url);
}

}