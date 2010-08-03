<?php

require_once 'PHPUnit/Framework.php';

class ContainerTest extends PHPUnit_Framework_TestCase {

    private $container;

    public function setUp() {
        $this->container = new GnocchiContainer();
    }

    public function testContainerHasAClassLoader() {
        $this->assertTrue($this->container->classLoader instanceof GnocchiClassLoader);
    }

    public function tearDown() {
        unset($this->container);
    }

}
