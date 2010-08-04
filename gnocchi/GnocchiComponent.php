<?php

/**
 * GnocchiComponent is a class that represents a component managed by Gnocchi container.
 *
 * The constructor receives a class name which is the name of the class that will be managed by Gnocchi
 * as a component.
 *
 * Example:
 *
 *      class Person {
 *          
 *          private $name;
 *
 *          function __construct($name) {
 *              $this->name = $name;
 *          }
 *
 *      }
 *
 *      $component = new GnocchiComponent("Person");
 *      $component->getClassName(); // will result "Person"
 *
 * @author Francisco Souza
 */
class GnocchiComponent {

    private $reflected, $constructorParameters;

    /**
     * The constructor receives a class name and reflects that class.
     *
     * @param $className
     *              Represents the name of the class that will be managed by Gnocchi
     * @throws ReflectionException if the className does not exists.
     */
    public function __construct($className) {
        $this->reflected = new ReflectionClass($className);
        $constructor = $this->reflected->getConstructor();
        $this->constructorParameters = $constructor->getParameters();
    }

    /**
     * @return the name of the reflected class
     */
    public function getClassName() {
        return $this->reflected->getName();
    }

    /**
     * @return an array containing all parameters of the constructor
     */
    public function getConstructorParameters() {
        return $this->constructorParameters;
    }

}
