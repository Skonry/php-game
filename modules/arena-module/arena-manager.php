<?php

class ArenaManager extends Manager {

    public function __construct() {
        $this->db = openDbConnection();
        $this->validEnemy = null;
    }

    public function searchEnemyPlayer($enemyName) {
        $stmt = $this->db->prepare('SELECT FROM players WHERE player_name=?');
        $stmt->bind_param('s', $enemyName);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows() > 0) {
            $this->validEnemy = true;
            return true;
        }
        $this->validEnemy = false;
        return false;
    }

    public function startDuel() {
        
    }
}