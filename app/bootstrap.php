<?php
    require_once 'config/config.php';

    // Load Libraries if they're found within the libraries folder and there is a class inside with the same name as the file.

    spl_autoload_register(function($clsName) {
        require_once 'libraries/' . $clsName . '.php';
    });

?>