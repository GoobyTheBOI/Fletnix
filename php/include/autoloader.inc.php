<?php
spl_autoload_register('autoLoader');

function autoLoader($className) {
    $path = "php/classes/";
    $extension = ".class.php";

    $fullPath = strtolower($path . $className . $extension);

    if (file_exists($fullPath)) {
        return false;
    }

    include "$fullPath";
}

