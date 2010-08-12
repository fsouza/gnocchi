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
     * @param string
     *              A regular expression representing the name of the class to be loaded.
     *              Example: "/Controller$/" for classes who ends with "Controller" (PeopleController, CarsController)
     * @param string
     *              Directory from where the class will be loaded.
     *              Example: "app/controllers/"
     */
    public function registerLoader($classNamePattern, $directory) {
        $loader[$classNamePattern] = $directory;
        $this->loaders[] = $loader;
        $this->addPattern($classNamePattern);
    }

    /**
     * Add a pattern to the internal patterns array.
     *
     * Validates if the pattern is already added.
     *
     * @param string
     *              The pattern to be added
     */
    protected function addPattern($pattern) {
        if (!in_array($pattern, $this->patterns)) {
            $this->patterns[] = $pattern;
        }
    }

    /**
     * Return all directories of a specified class name pattern.
     *
     * Example code:
     *      >>> $loader = new GnocchiClassLoader();
     *      >>> $loader->registerLoader('/Controller$/', 'app/controllers');
     *      >>> $loader->registerLoader('/Controller$/', 'lib/controllers');
     *      >>> $directories = $loader->findPatternDirectories('Controller$');
     *      >>> // $directories should equal to array('app/controllers', 'lib/controllers')
     *
     * @param string
     *              The pattern that will be searched (a regular expression)
     *
     * @return array array containing all directories mapped to this class name patten.
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

    /**
     * Load a class by a provided name.
     *
     * @param string
     *              The name of the class that will be loaded.
     * @throws GnocchiClassNotFoundException when the class is not found
     */
    public function loadClass($className) {
        $p = NULL;
        foreach ($this->patterns as $pattern) {
            if (preg_match($pattern, $className)) {
                $p = $pattern;
                break;
            }
        }

        $directories = $this->findPatternDirectories($p);
        $found = 0;
        foreach ($directories as $directory) {
            if (substr($directory, -1) === '/') {
                $fullPathPattern = '%s%s.php';
            } else {
                $fullPathPattern = '%s/%s.php';
            }
            $fullPath = sprintf($fullPathPattern, $directory, $className);

            if (file_exists($fullPath)) {
                require_once $fullPath;
                $found++;
            }
        }

        if ($found === 0) {
            throw new GnocchiClassNotFoundException($className);
        }
    }

}
