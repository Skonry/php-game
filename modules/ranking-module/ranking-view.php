<?php 

class RankingView extends View {
    
    public function __construct($rankingManager) {
        $this->rankingManager = $rankingManager;
    }
    
    public function displayPlayersRanking() {
        $this->data['ranking'] = $this->rankingManager->ranking;
        require 'ranking-template.php';
    }
    
}