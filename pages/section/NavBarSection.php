<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
include __DIR__.'/BasePage.php';

class NavBarSection extends BasePage {
    
    private $driver;
    private $shoppingCartLink;
    private $shoppingCartBadge;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
        $this->shoppingCartLink = WebDriverBy::cssSelector('#shopping_cart_container > a');
        $this->shoppingCartBadge = WebDriverBy::cssSelector('#shopping_cart_badge');
    }

    public function clickOnShoppingCartLink(){
        $this->driver->findElement($this->shoppingCartLink)->click();
    }

    public function getShoppingCartBadgeValue() {
        return $this->driver->findElement($this->shoppingCartBadge)->getText();
    } 
}