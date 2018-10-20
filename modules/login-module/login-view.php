<?php

class LoginView extends View {
    public function __construct($loginManager = null) {
        parent::__construct();
        $this->loginManager = $loginManager;
    }

    public function displayLoginPage() {
        if ($this->loginManager) {
            $this->data['error'] = $this->loginManager->error;
        }
        $this->render();
    }

    private function render() {
        require 'login-template.php';
    }
}