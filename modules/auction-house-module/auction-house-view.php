<?php 

class AuctionHouseView extends View {
    
    public function __construct($auctionHouseManager) {
        parent::__construct();
        $this->auctionHouseManager = $auctionHouseManager;
    }
    
    public function display() {
        require 'auction-house-template.php';
    }
    
}