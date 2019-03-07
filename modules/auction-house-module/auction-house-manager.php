<?php

class AuctionHouseManager extends Manager {

    public function __construct() {
        $this->db = openDbConnection();
    }
}