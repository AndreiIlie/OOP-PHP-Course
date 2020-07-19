<?php

function NicePrint($object) {
    echo '<pre>';
    print_r($object);
    echo '</pre>';
}

function Redirect($newLocation) {
    header('Location: ' . URLROOT . '/' . $newLocation);
}

?>