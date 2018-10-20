<?php 

class ExpeditionView extends View{
    public function __construct($expeditionManager) {
        $this->expeditionManager = $expeditionManager;
    }
    
    public function display() {
        $this->data['expeditionStatus'] = $this->expeditionManager->expeditionStatus;
        $this->data['endOfExpedition'] = $this->expeditionManager->endOfExpedition; 
        $this->render();
    }

    private function render() {
        require 'expedition-template.php';
    }
}