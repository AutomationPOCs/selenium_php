<?php

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
include __DIR__.'/BasePage.php';

class LoginPage extends BasePage {
    
    private $driver;
    private $usernameInputField;
    private $passwordInputField;
    private $loginButton;

    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
        $this->usernameInputField = WebDriverBy::id('user-name');
        $this->passwordInputField = WebDriverBy::id('password');
        $this->loginButton = WebDriverBy::id('login-button');
    }

    public function login($username, $passsword){
        $this->driver->findElement($this->usernameInputField)->sendKeys($username);
        $this->driver->findElement($this->passwordInputField)->sendKeys($passsword);
        $this->driver->findElement($this->loginButton)->click();
    }
}