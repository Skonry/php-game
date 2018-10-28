<?php

require 'load-module-configuration.php';
require 'instantiate-module-controller.php';

session_start();

// get requested uri
$uri = $_SERVER['REQUEST_URI'];
preg_match('/\/php-game-engine\/([\w-]+)\/?([\w-]+)?/', $uri, $matches);

// extract module
$moduleName = $matches[1];

// extract action
$actionName = isset($matches[2]) ? $matches[2] : 'index';

// redirect player to login page if he isn't logged in and try to access other module then login module
if (!isset($_SESSION['player_name']) && $moduleName !== 'login') {
    $moduleName = 'login';
    $actionName = 'index';
}

// load module's configuration
$config = loadModuleConfiguration($moduleName);

// instaniate module's controller and call on it action
$moduleController = instantiateModuleController($moduleName, $config);
$moduleController->{$config->actions->$actionName}();

