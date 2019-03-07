<?php

require 'auction-house-manager.php';
require 'auction-house-view.php';

class AuctionHouseController extends Controller {
    
    public function __construct($config) {
        $this->config = $config;
    }

    public function index() {
        $auctionHouseManager = new AuctionHouseManager();
        $view = new AuctionHouseView($auctionHouseManager);
        $view->display();
    }
}