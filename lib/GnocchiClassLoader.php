<?php

/**
 * A ClassLoader, where you can registry some patterns to load the classes
 *
 * @author Francisco Souza
 */
class GnocchiClassLoader {

    private $loaders;
    
    /**
     * ClassLoader constructor.
     *
     * Just to initialize the ClassLoader internals variables.
     */
    public function __construct() {
        $this->loaders = array();
    }

    /**
     * Method used for register a loader.
     *
     * @param $classNamePattern:
     *              A regular expression representing the name of the class to be loaded.
     *               Examples: "Controller$"
     */
    public function registerLoader($classNamePattern, $directory) {
        $this->loaders[$classNamePattern] = $directory;
    }

}
