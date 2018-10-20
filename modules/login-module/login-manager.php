<?php

class LoginManager extends Manager {
    public function __construct() {
        $this->db = openDbConnection();
        $this->error = null;
    }
    public function verifyCredentials($login, $password) {
        $stmt = $this->db->prepare('SELECT player_login, player_password FROM players WHERE player_login=?'); 
        $stmt->bind_param('s', $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $playerData = $result->fetch_assoc();
        if (!$playerData) {
            $this->error = 'Niepoprawny login lub hasło';
            return false;
        }
        $validPassword = password_verify($password, $playerData['player_password']);
        if (!$validPassword) {
            $this->error = 'Niepoprawne login lub hasło';
            return false;
        }
        $_SESSION['player_name'] = $playerData['player_login'];
        return true;
    }
}