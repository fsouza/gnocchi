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
     * @param $component: The component name or the component object (instance of GnocchiComponent)
     */
    public function addComponent($component) {
        if ($component instanceof GnocchiComponent) {
            $this->components[$component->getClassName()] = $component;
        } else {
            $this->components[$component] = new GnocchiComponent($component);
        }
    }

    /**
     * @return the component identified by a name
     */
    public function getComponent($componentName) {
        return $this->components[$componentName];
    }

}

