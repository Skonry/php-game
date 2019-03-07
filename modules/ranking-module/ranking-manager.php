<?php

class RankingManager extends Manager {

    public function __construct() {
        $this->db = openDbConnection();
        $this->ranking = null;
    }

    public function getPlayersRanking() {
        $result = $this->db->query('SELECT player_login, experience_points, experience_level FROM players ORDER BY experience_points');
        $this->ranking = $result->fetch_all(MYSQLI_ASSOC);
    }
}