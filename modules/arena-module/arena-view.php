<?php 

class ArenaView extends View {
    
    public function __construct($arenaManager) {
        $this->arenaManager = $arenaManager;
    }
    
    public function display() {
        $this->data['validEnemy'] = $this->arenaManager->validEnemy;
        require 'arena-template.php';
    }

    public function displayDuelResult() {
        require 'duel-result-template.php';
    }
}