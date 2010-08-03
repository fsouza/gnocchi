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
     *              Example: "Controller$"
     * @param $directory:
     *              Directory from where the class will be loaded.
     *              Example: "app/controllers/"
     */
    public function registerLoader($classNamePattern, $directory) {
        $this->loaders[$classNamePattern] = $directory;
    }



}
