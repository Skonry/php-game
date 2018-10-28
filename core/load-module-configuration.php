<?php

function loadModuleConfiguration($moduleName) {
    $path = '../modules/' . $moduleName . '-module/' . $moduleName . '-config.json';
    if (file_exists($path)) {
        $fileContent = file_get_contents($path);
        return json_decode($fileContent);
    }
    else {
        throw new Exception('Module\'s configuration file does not exist.' );
    }
}