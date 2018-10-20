<?php

class ExpeditionManager extends Manager {
    public function __construct() {
        $this->db = openDbConnection();
        $this->expeditionStatus = null;
        $this->endOfExpedition = null;
    }

    public function getExpeditionStatus() {
        $endOfExpedition = $this->getEndOfExpedition();
        if (!$endOfExpedition) {
            $this->expeditionStatus = 'isAtHome';
            return;
        }
        $currentDate = (new DateTime())->format('Y-m-d H:i:s');
        if ($currentDate > $endOfExpedition) {
            $this->expeditionStatus = 'justReturned';
            $stmt = $this->db->prepare('UPDATE players SET end_of_expedition=? WHERE player_login=?');
            $null = NULL;
            $stmt->bind_param('ss', $null, $_SESSION['player_name']);
            $stmt->execute();
        } 
        else {
            $this->expeditionStatus = 'isOnExpedition';
            $this->endOfExpedition = $endOfExpedition;
        }
    }

    public function sendToExpedition($expeditionTime) {
        $endOfExpedition = new DateTime();
        $endOfExpedition->add(new DateInterval('PT' . $expeditionTime . 'M'));
        $endOfExpedition = $endOfExpedition->format('Y-m-d H:i:s');
        $stmt = $this->db->prepare('UPDATE players SET end_of_expedition=? WHERE player_login=?');
        $stmt->bind_param('ss', $endOfExpedition, $_SESSION['player_name']);
        $stmt->execute();
        $this->expeditionStatus = 'isOnExpedition';
        $this->endOfExpedition = $endOfExpedition;
    }

    public function cancelExpedition() {
        $stmt = $this->db->prepare('UPDATE players SET end_of_expedition=? WHERE player_login=?');
        $null = NULL;
        $stmt->bind_param('ss', $null, $_SESSION['player_name']);
        $stmt->execute();
        $this->expeditionStatus = 'isAtHome';
    }

    private function getEndOfExpedition() {
        $stmt = $this->db->prepare('SELECT end_of_expedition FROM players WHERE player_login=?');
        $stmt->bind_param('s', $_SESSION['player_name']);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['end_of_expedition'];
    }
}