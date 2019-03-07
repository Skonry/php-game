<?php

require 'ranking-manager.php';
require 'ranking-view.php';

class RankingController extends Controller {
    
    public function __construct($config) {
        $this->config = $config;
    }

    public function index() {
        $rankingManager = new RankingManager();
        $rankingManager->getPlayersRanking();
        $view = new RankingView($rankingManager);
        $view->displayPlayersRanking();
    }
}