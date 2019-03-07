<?php 

class MailView extends View {
    
    public function __construct($mailManager) {
        $this->mailManager = $mailManager;
    }

    public function displayMailBox() {
        require 'mailbox-template.php';
    }
}