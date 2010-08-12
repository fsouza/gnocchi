<?php

/**
 * GnocchiAssembler is who assembly the components managed by Gnocchi.
 *
 * @author Francisco Souza
 */
class GnocchiAssembler {

    private $container;

    /**
     * Construct the assembler :)
     *
     * @param GnocchiContainer (optional)
     *              GnocchiContainer instance that manages all components
     */
    public function __construct($container = NULL) {
        if ($container) {
            $this->setContainer($container);
        }
    }

    /**
     * Set the internal container
     *
     * @param GnocchiContainer
     *              GnocchiContainer instance that manages all components
     */
    public function setContainer($container) {
        $this->container = $container;
    }

    /**
     * Returns the instance of the component.
     *
     * @param string
     *                  The component class name
     *
     * @throws GnocchiComponentNotFoundException if the component doesn't exists
     * @throws ReflectionException if something wrong happens during the class instantiation
     *
     * @return Object the component instance.
     */
    public function get($componentName) {
        $component = $this->container->getComponent($componentName);
        $class = $component->getReflectedClass();
        $constructorParameters = $component->getConstructorParametersWithValues();
        return $class->newInstanceArgs($constructorParameters);
    }

}
