<?php

class RegisterManager extends Manager {
    public function __construct($config) {
        $this->config = $config;
        $this->db = openDbConnection();
        $this->loginError = null;
        $this->passwordError = null;
        $this->emailError = null;
    }

    public function verifyRegistrationData($data) {
        $this->loginError = $this->verifyLogin($data['player_login']);
        $this->passwordError = $this->verifyPassword($data['player_password']);
        $this->emailError = $this->verifyEmail($data['player_email']);
        if ($this->loginError || $this->passwordError || $this->emailError) {
            return false;
        }
        return true;
    }

    public function createNewAccount($data) {
        $hashedPassword = password_hash($data['player_password'], PASSWORD_DEFAULT);
        $currentDate = date('Y-m-d');
        $stmt = $this->db->prepare('INSERT INTO players (player_login, player_password, player_email, registration_date) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $data['player_login'], $hashedPassword, $data['player_email'], $currentDate);
        $stmt->execute();
        $_SESSION['player_name'] = $data['player_login'];
    }

    private function verifyLogin($login) {
        $minLength = $this->config->login->minLength;
        $maxLength = $this->config->login->maxLength;
        if (strlen($login) < $minLength) {
            return 'Zakrótki login. Powinien mieć od ' . $minLength . ' do ' . $maxLength . ' znaków';
        }
        if (strlen($login) > $maxLength) {
            return 'Zadługi login. Powinien mieć od ' . $minLength . ' do ' . $maxLength . ' znaków';
        }
        $stmt = $this->db->prepare('SELECT player_login FROM players WHERE player_login=?');
        $stmt->bind_param('s', $login);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return 'Gracz o takim loginie już istnieje';
        }
    }

    private function verifyPassword($password) {
        $minLength = $this->config->password->minLength;
        $maxLength = $this->config->password->maxLength;
        if (strlen($password) < $minLength) {
            return 'Zakrótkie hasło. Powinno mieć od ' . $minLength . ' do ' . $maxLength . ' znaków';
        }
        if (strlen($password) > $maxLength) {
            return 'Zadługie hasło. Powinno mieć od ' . $minLength . ' do ' . $maxLength . ' znaków';
        }
    }

    private function verifyEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 'E-mail nie jest poprawny';
        }
        $stmt = $this->db->prepare('SELECT player_email FROM players WHERE player_email=?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return 'Gracz o taki e-mailu już istnieje';
        }
    }
}