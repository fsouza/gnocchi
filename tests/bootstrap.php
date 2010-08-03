<?php

function __autoload($className) {
    if (strpos($className, 'Gnocchi') === 0) {
        $file = 'lib/'.$className.'.php';
    } else {
        $file= 'tests/classes/'.$className.'.php';
    }

    if (file_exists($file)) {
        require_once $file;
    }
}

require_once 'PHPUnit/Framework.php';
