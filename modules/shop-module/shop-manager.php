<?php

class ShopManager extends Manager {

    public function __construct() {
        $this->db = openDbConnection();
        $this->shopItems = [];
    }

    public function getItems() {
        array_push($this->shopItems, ['name' => 'item1', 'value' => 10]);
        array_push($this->shopItems, ['name' => 'item2', 'value' => 15]);
        array_push($this->shopItems, ['name' => 'item3', 'value' => 12]);
    }

    public function buyItem() {
        
    }

    public function sellItem() {

    }
}