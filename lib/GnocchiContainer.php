<?php

/**
 * Gnocchi container is the lightweight container for Dependency Injection in Gnocchi.
 *
 * @author Francisco Souza
 */
class GnocchiContainer {

    var $classLoader;

    public function __construct() {
        $this->classLoader = new GnocchiClassLoader();
    }

}

