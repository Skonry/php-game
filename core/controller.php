<?php

abstract class Controller {

    public function redirect($path, $parameters = []) {
        $queryString = '';
        if (count($parameters) > 0) {
            $keys = array_keys($parameters);
            $queryStringl .= '?' . $keys[0] . '=' . $parameters[$keys[0]];
            for ($i = 1; i < count($parameters); $i++) {
                $queryString .= '&' . $keys[i] . '=' . $parameters[$keys[1]];
            }
        }
        $uri = $_SERVER['HTTP_HOST'] . '/php-game-engine' . $path . $queryString;
        header('Location: http://' . $uri);
    }
}