<?php

session_start();

$uri = $_SERVER['REQUEST_URI'];
preg_match('/\/php-game-engine\/([\w-]+)\/?([\w-]+)?/', $uri, $matches);
$moduleName = $matches[1];
$actionUrl = isset($matches[2]) ? $matches[2] : 'index';

if (!isset($_SESSION['player_name']) && $moduleName !== 'login') {
    $moduleName = 'login';
    $actionUrl = 'index';
}

$config = loadModuleConfiguration($moduleName);
if ($config) {
    $moduleController = instantiateControllerObject($moduleName, $config);
    $moduleController->{$config->actions->$actionUrl}();
}

function loadModuleConfiguration($moduleName) {
    $path = '../modules/' . $moduleName . '-module/' . $moduleName . '-config.json';
    if (file_exists($path)) {
        $fileContent = file_get_contents($path);
        return json_decode($fileContent);
    }
    else {
        return false;
    }
}

function instantiateControllerObject($moduleName, $config) {
    $path = '../modules/' . $moduleName . '-module/' . $moduleName . '-controller.php';
    if (file_exists($path)) {
        require $path;
        return new $config->mainControllerClass($config);
    }
}
    
