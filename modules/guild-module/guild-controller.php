<?php

require 'guild-manager.php';
require 'guild-view.php';

class GuildController extends Controller {
    
    public function __construct($config) {
        $this->config = $config;
    }

    public function index() {
        $guildManager = new GuildManager();
        $isMemberOfGuild = $guildManager->isMemberOfGuild();
        $view = new GuildView($guildManager);
        if ($isMemberOfGuild) {
            $view->displayGuildPage();
        }
        else {
            $view->displayJoinToGuild();
        }
    }
}