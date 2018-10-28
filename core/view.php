<?php

abstract class View {
    
    public function __construct() {
        $this->data = [];
    }

    protected function setData($key, $value) {
        $this->data[$key] = $value;
    }
}