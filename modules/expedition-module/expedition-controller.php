<?php

require '../core/controller.php';
require '../core/manager.php';
require '../core/view.php';
require '../core/open-db-connection.php';
require 'expedition-manager.php';
require 'expedition-view.php';

class ExpeditionController extends Controller {

    public function __construct($config) {
        $this->config = $config;
    }

    public function index() {
        $expeditionManager = new ExpeditionManager();
        $expeditionManager->getExpeditionStatus();
        $view = new ExpeditionView($expeditionManager);
        $view->display();
    }

    public function sendToExpedition() {
        $expeditionManager = new ExpeditionManager();
        $expeditionManager->sendToExpedition($_POST['expedition_time']);
        $this->redirect('/expedition');
    }
    
    public function cancelExpedition() {
        $expeditionManager = new ExpeditionManager();
        $expeditionManager->cancelExpedition();
        $this->redirect('/expedition');
    }
}