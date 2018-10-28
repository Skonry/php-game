<?php 

class GuildView extends View {
    
    public function __construct($guildManager) {
        $this->guildManager = $guildManager;
    }
    
    public function displayGuildPage() {
        $this->data['guildName'] = $this->guildManager->guildName;
        require 'guild-page-template.php';
    }

    public function displayJoinToGuild() {
        require 'join-guild-template.php';
    }
}