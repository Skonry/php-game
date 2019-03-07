<?php

require 'shop-manager.php';
require 'shop-view.php';

class ShopController extends Controller {
    
    public function __construct($config) {
        $this->config = $config;
    }

    public function index() {
        $shopManager = new ShopManager();
        $shopManager->getItems();
        $view = new ShopView($shopManager);
        $view->display();
    }

    public function sellItem() {
        $shopManager = new ShopManager();
        $shopManager->sellItem();
        $this->redirect('/shop');
    }

    public function buyItem() {
        $shopManager = new ShopManager();
        $shopManager->buyItem();
        $this->redirect('/shop');
    }
}