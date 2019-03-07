<?php

class MailManager extends Manager {

    public function __construct() {
        $this->db = openDbConnection();
    }

    public function fetchMails() {
        
    }
}