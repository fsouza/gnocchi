<?php

function __autoload($className) {
    require_once 'lib/'.$className.'.php';
}

require_once 'PHPUnit/Framework.php';
