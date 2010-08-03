<?php

function __autoload($className) {
    if (strpos($className, 'Gnocchi') === 0) {
        require_once 'lib/'.$className.'.php';
    } else if (strpos($className, 'Unknow') === FALSE) {
        require_once 'tests/classes/'.$className.'.php';
    }
}

require_once 'PHPUnit/Framework.php';
