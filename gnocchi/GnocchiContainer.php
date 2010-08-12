<?php

/**
 * Gnocchi container is the lightweight container for Dependency Injection in Gnocchi.
 *
 * @author Francisco Souza
 */
class GnocchiContainer {

    private $components;

    /**
     * Container constructor, has no parameters, just construct the object inside.
     */
    public function __construct() {
        $this->components = array();
    }

    /**
     * Add a component to be managed by Gnocchi.
     *
     * @param string The component name or the component object (instance of GnocchiComponent)
     * @param array An array hashmap containing the constructor parameters and its values
     */
    public function addComponent($component, $constructorParams = array()) {
        if ($component instanceof GnocchiComponent) {
            $this->components[$component->getClassName()] = $component;
            $this->setConstructorParameters($component->getClassName, $constructorParams);
        } else {
            $this->components[$component] = new GnocchiComponent($component);
            $this->setConstructorParameters($component, $constructorParams);
        }
    }

    /**
     * Set all constructors parameters (with values) to a component.
     *
     * The component should be already managed by this container.
     *
     * @param string The name of the component, already managed by the container
     */
    public function setConstructorParameters($componentName, $parameters) {
        $component = $this->getComponent($componentName);
        foreach ($parameters as $parameterName => $parameterValue) {
            $component->setConstructorParameterValue($parameterName, $parameterValue);
        }
    }

    /**
     * @return GnocchiComponent component identified by a name
     */
    public function getComponent($componentName) {
        if (!array_key_exists($componentName, $this->components)) {
            throw new GnocchiComponentNotFoundException($componentName);
        }
        return $this->components[$componentName];
    }

}

