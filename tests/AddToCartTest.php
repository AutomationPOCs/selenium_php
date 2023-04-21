<?php

use PHPUnit\Framework\TestCase;
include __DIR__.'/../vendor/autoload.php';
include __DIR__.'/../utils/DriverUtils.php';
include __DIR__.'/../pages/LoginPage.php';
include __DIR__.'/../pages/InventoryPage.php';

class AddToCartTest extends TestCase
{
    protected $driver;
    protected $baseUrl;
    protected $loginPage;
    protected $inventoryPage;

    protected function setUp(): void
    {
        $this->driver = DriverUtils::getDriver();
        $this->loginPage = new LoginPage($this->driver);
        $this->inventoryPage = new InventoryPage($this->driver);
    }

    protected function tearDown(): void
    {
        $this->driver->quit();
    }

    public function testLogin()
    {
        // Navigate to site
        $this->driver->get($this->baseUrl);

        // Perform login
        
        $this->loginPage->login('standard_user', 'secret_sauce');
    }

    public function addToCart()
    {   // User add to cart and increase quantity by 2
        $this->assertEquals('0', $this->inventoryPage->navBarSection->getShoppingCartBadgeValue());
        $this->inventoryPage->addToCart();
        $this->assertEquals('1', $this->inventoryPage->navBarSection->getShoppingCartBadgeValue());
        $this->inventoryPage->addToCart();
        $this->assertEquals('2', $this->inventoryPage->navBarSection->getShoppingCartBadgeValue());

        // User clicks on shopping cart icon
        $this->inventoryPage->navBarSection->clickOnShoppingCartLink()
    }
}
