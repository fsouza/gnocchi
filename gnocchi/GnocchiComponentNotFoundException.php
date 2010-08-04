<?php

class GnocchiComponentNotFoundException extends Exception {

    public function __construct($componentName) {
        $this->message = "Component not found: $componentName.";
    }

}
