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

    public function expectCountProvider() {
        return array(
                array('Person', 1),
                array('Car', 2),
                array('Chicken', 0)
            );
    }

}
