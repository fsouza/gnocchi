<?php

/**
 * A ClassLoader, where you can registry some patterns to load the classes
 *
 * This ClassLoader is able to work only with classes and files using the same names.
 * e.g.: A class called "Person" should be in a file called "Person.php".
 *
 * @author Francisco Souza
 */
class GnocchiClassLoader {

    private $loaders;
    private $patterns;
    
    /**
     * ClassLoader constructor.
     *
     * Just to initialize the ClassLoader internals variables.
     */
    public function __construct() {
        $this->loaders = array();
        $this->patterns = array();
    }

    /**
     * Method used for register a loader.
     *
     * @param $classNamePattern:
     *              A regular expression representing the name of the class to be loaded.
     *              Example: "Controller$" for classes that ends with "Controller" (PeopleController, CarsController)
     * @param $directory:
     *              Directory from where the class will be loaded.
     *              Example: "app/controllers/"
     */
    public function registerLoader($classNamePattern, $directory) {
        $loader[$classNamePattern] = $directory;
        $this->loaders[] = $loader;
        $this->patterns = $classNamePattern;
    }

    /**
     * Return all directories of a specified class name pattern.
     *
     * Example code:
     *      >>> $loader = new GnocchiClassLoader();
     *      >>> $loader->registerLoader('Controller$', 'app/controllers');
     *      >>> $loader->registerLoader('Controller$', 'lib/controllers');
     *      >>> $directories = $loader->findPatternDirectories('Controller$');
     *      >>> // $directories should equal to array('app/controllers', 'lib/controllers')
     *
     * @param $classNamePattern
     *              The pattern that will be searched
     *
     * @return an array containing all directories mapped to this class name patten.
     *         Each element of this array is a string.
     */
    public function findPatternDirectories($classNamePattern) {
        $directories = array();
        foreach ($this->loaders as $loader) {
            if (array_key_exists($classNamePattern, $loader)) {
                $directories[] = $loader[$classNamePattern];
            }
        }

        return $directories;
    }

    public function loadClass($className) {
        // TODO: make this method :)
    }

}
