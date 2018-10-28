<?php

function instantiateModuleController($moduleName, $config) {
    $path = '../modules/' . $moduleName . '-module/' . $moduleName . '-controller.php';
    if (file_exists($path)) {
        require $path;
        return new $config->mainControllerClass($config);
    }
    else {
        throw new Exception('Module\'s main controller file does not exist.' );
    }
}