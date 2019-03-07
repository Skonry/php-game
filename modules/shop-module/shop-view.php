<?php 

class ShopView extends View {
    
    public function __construct($shopManager = null) {
        $this->shopManager = $shopManager;
    }
    
    public function display() {
        $this->data['shopItems'] = $this->shopManager->shopItems;
        require 'shop-template.php';
    }
}