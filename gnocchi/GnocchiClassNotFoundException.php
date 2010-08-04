<?php

class GnocchiClassNotFoundException extends Exception {

    public function __construct($className) {
        $this->message = "Gnocchi can not found $className.";
    }

}
