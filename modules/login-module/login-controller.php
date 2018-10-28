<?php

require '../core/controller.php';
require '../core/manager.php';
require '../core/view.php';
require '../core/open-db-connection.php';
require 'login-manager.php';
require 'register-manager.php';
require 'login-view.php';
require 'register-view.php';

class LoginController extends Controller {
    
    public function __construct($config) {
        $this->config = $config;
    }

    public function displayLoginPage() {
        $view = new LoginView();
        $view->displayLoginPage();
    }

    public function verifyLoginData() {
        $loginManager = new LoginManager($this->config);
        $isDataValid = $loginManager->verifyCredentials($_POST['player_login'], $_POST['player_password']);
        if ($isDataValid) {
            $this->redirect('/expedition');
        }

        // display login page with error message(s)
        $view = new LoginView($loginManager);
        $view->displayLoginPage();
    }

    public function displayRegistrationPage() {
        $view = new RegisterView();
        $view->displayRegistrationPage();
    }

    public function verifyRegistrationData() {
        $registerManager = new RegisterManager($this->config);
        $isDataValid = $registerManager->verifyRegistrationData($_POST);
        if ($isDataValid) {
            $registerManager->createNewAccount($_POST);
            $this->redirect("/expedition");
        }

        // display registration page with error message(s)
        $view = new RegisterView($registerManager);
        $view->displayRegistrationPage();
    }
    
}