<?php

require 'arena-manager.php';
require 'arena-view.php';

class ArenaController extends Controller {
    
    public function __construct($config) {
        $this->config = $config;
    }

    public function index() {
        $arenaManager = new ArenaManager();
        $view = new ArenaView($arenaManager);
        $view->display();
    }

    public function duel() {
        $arenaManager = new ArenaManager();
        $validEnemy = $arenaManager->searchEnemyPlayer($_POST['enemy_name']);
        $view = new ArenaView($arenaManager);
        if ($validEnemy) {
            $arenaManager->startDuel();
            $view->displayDuelResult();
        }
        else {
            $view->display();
        }
    }
}