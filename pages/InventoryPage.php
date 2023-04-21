<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
include __DIR__.'/BasePage.php';
include __DIR__.'/section/NavBarSection.php';

class InventoryPage extends BasePage {
    
    private $driver;
    private $addToCartSauceLabsBackpack;
    private $itemPrice;

    public NavBarSection $navBarSection;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
        $this->navBarSection = new NavBarSection($driver);
        $this->addToCartSauceLabsBackpack = WebDriverBy::id('add-to-cart-sauce-labs-backpack');
        $this->itemPrice = WebDriverBy::cssSelector('#inventory_container > div > div:nth-child(1) > div.inventory_item_description > div.pricebar > div');
    }

    public function addProductToCart(){
        $this->driver->findElement($this->addToCartSauceLabsBackpack)->click();
    }

    public function getItemPrice() {
        return $this->driver->findElement($this->itemPrice)->getText();
    } 
}