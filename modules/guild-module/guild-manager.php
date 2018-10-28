<?php

class GuildManager extends Manager {

    public function __construct() {
        $this->db = openDbConnection();
        $this->guildName = null;
    }

    public function isMemberOfGuild() {
        $sql = 'SELECT g.name FROM players AS p, guilds AS g WHERE p.player_login=? AND p.member_of_guild = g.name';
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('s', $_SESSION['player_name']);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if ($result) {
            $this->guildName = $result['name'];
            return true;
        }
        return false;
    }
}