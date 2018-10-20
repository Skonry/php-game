<?php

function openDbConnection() {
    $connection = new mysqli('localhost', 'root', '', 'php-game-engine');
    if ($connection->connect_errno) {
        echo 'Nie udało się połączyć z bazą danych. Błąd numer: ' . $connection->connect_errno . '. ' . $connection->connect_error;
    }
    return $connection;
}