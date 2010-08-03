<?php

require_once 'PHPUnit/Framework.php';
require_once 'lib/GnocchiContainer.php';

class ContainerTest extends PHPUnit_Framework_TestCase {

    public function testStupidAssert() {
        $this->assertEquals(1, 1);
    }

}
