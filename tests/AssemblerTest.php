<?php

class AssemblerTest extends PHPUnit_Framework_TestCase {

    private $assembler;

    public function setUp() {
        $this->assembler = new GnocchiAssembler();
    }

    /**
     * @dataProvider classInstanceProvider
     */
    public function testGetInstanceOfAGivenClass($class, $constructorParameters, $expectedObject) {
        $container = new GnocchiContainer();
        $container->addComponent($class, $constructorParameters);
        $this->assembler->setContainer($container);
        $object = $this->assembler->get($class);
        $this->assertEquals($object, $expectedObject);
    }

    public function classInstanceProvider() {
        $personParams = array('name' => 'Francisco Souza');
        $person = new Person($personParams['name']);
        $returnArray = array();
        $returnArray[] = array('Person', $personParams, $person);

        $carParams = array('name' => 'C300', 'brand' => 'Chrysler');
        $car = new Car($carParams['name'], $carParams['brand']);
        $returnArray[] = array('Car', $carParams, $car);

        return $returnArray;
    }

}
