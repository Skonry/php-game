<?php

class RegisterView extends View {
    public function __construct($registerManager = null) {
        parent::__construct();
        $this->registerManager = $registerManager;
    }
   
    public function displayRegistrationPage() {
        if (!$this->registerManager) {
        $this->data['login_error'] = $this->registerManager->loginError;
        $this->data['password_error'] = $this->registerManager->passwordError;
        $this->data['email_error'] = $this->registerManager->emailError;
        }
        $this->render();
    }

    private function render() {
        require 'register-template.php';
    }
}