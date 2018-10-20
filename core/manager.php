<?php 

abstract class Manager {
    public function getCurrentDataTime() {
        return (new Date('now'))->format('Y-m-d H:i:s');
    } 
}