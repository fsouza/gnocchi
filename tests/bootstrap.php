<?php

function __autoload($className) {
    require_once 'lib/'.$className.'.php';
}
