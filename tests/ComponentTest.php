<?php

class ComponentTest extends PHPUnit_Framework_TestCase {

    public function testNameOfClass() {
        $component = new GnocchiComponent('Person');
        $this->assertEquals($component->getClassName(), 'Person');
    }

    /**
     * @dataProvider expectCountProvider
     */
    public function testConstructorParametersCount($className, $expectedCount) {
        $component = new GnocchiComponent($className);
        $parametersCount = count($component->getConstructorParameters());
        $this->assertEquals($parametersCount, $expectedCount);
    }

    /**
     * @expectedException ReflectionException
     */
    public function testRaisesExceptionReflectingAnUnknowClass() {
        $component = new GnocchiComponent('UnknowClass');
    }

    /**
     * @expectedException ReflectionException
     */
    public function testRaisesExcpetionGettingValuesForParametersWithouValues() {
        $component = new GnocchiComponent('Person');
        $parameters = $component->getConstructorParametersWithValues();
    }

    /**
     * @dataProvider classAndParametersProvider
     */
    public function testSetValueForConstructorParameter($class, $params) {
        $component = new GnocchiComponent($class);
        foreach ($params as $param => $value) {
            $component->setConstructorParameterValue($param, $value);
        }
        $this->assertEquals($component->getConstructorParametersWithValues(), $params);
    }

    public function expectCountProvider() {
        return array(
                array('Person', 1),
                array('Car', 2),
                array('Chicken', 0)
            );
    }

    public function classAndParametersProvider() {
        return array(
                array('Person', array('name' => 'Barack Obama')),
                array('Car', array('name' => 'C300', 'brand' => 'Chrysler')),
                array('Chicken', array())
            );
    }

}
