<?php
    require_once 'config/config.php';

    // Load Libraries

    spl_autoload_register(function($clsName) {
        require_once 'libraries/' . $clsName . '.php';
    });

?>