<?php

class ContainerTest extends PHPUnit_Framework_TestCase {

    private $container;

    public function setUp() {
        $this->container = new GnocchiContainer();
    }

    public function testGetComponentOnContainer() {
        $this->container->addComponent('Person');
        $component = $this->container->getComponent('Person');
        $this->assertEquals($component->getClassName(), 'Person');
    }

    /**
     * @expectedException GnocchiComponentNotFoundException
     */
    public function testRaisesExceptionOnUnknowComponent() {
        $this->container->getComponent('UnknowComponent');
    }

    public function tearDown() {
        unset($this->container);
    }

}
