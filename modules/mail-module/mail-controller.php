<?php

require 'mail-manager.php';
require 'mail-view.php';

class MailController extends Controller {
    
    public function __construct($config) {
        $this->config = $config;
    }

    public function index() {
        $mailManager = new MailManager();
        $mailManager->fetchMails();
        $view = new MailView($mailManager);
        $view->displayMailbox();
    }
}