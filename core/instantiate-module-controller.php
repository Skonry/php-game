<?php

function instantiateModuleController($moduleName, $config) {
    $path = '../modules/' . $moduleName . '-module/' . $moduleName . '-controller.php';
    if (file_exists($path)) {
        require 'controller.php';
        require 'manager.php';
        require 'view.php';
        require 'open-db-connection.php';
        require $path;
        return new $config->mainControllerClass($config);
    }
    else {
        throw new Exception('Module\'s main controller file does not exist.' );
    }
}