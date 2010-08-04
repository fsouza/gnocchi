<?php

class ClassLoaderTest extends PHPUnit_Framework_TestCase {

    private $loader;

    public function setUp() {
        $this->loader = new GnocchiClassLoader();
    }

    /**
     * @expectedException GnocchiClassNotFoundException
     */
    public function testRaisesExceptionLoadingAnUnexistingClass() {
        $loader = new GnocchiClassLoader();
        $loader->registerLoader('/Controller$/', 'app/controller');
        $loader->loadClass('PeopleController');
    }

    public function testLoadAnExistingClass() {
        $loader = new GnocchiClassLoader();
        $loader->registerLoader('/Loaded/', 'tests/classes/load');
        $loader->loadClass('AutoLoadedByClassLoader');
        $itens = array('just', 'for', 'test');
        $obj = new AutoLoadedByClassLoader($itens);
        $this->assertEquals($obj->itens, $itens);
    }

    /**
     * @dataProvider patternArrayProvider
     */
    public function testFindPatterns($pattern, $directories) {
        foreach ($directories as $directory) {
            $this->loader->registerLoader($pattern, $directory);
        }

        $this->assertEquals($this->loader->findPatternDirectories($pattern), $directories);
    }

    public function patternArrayProvider() {
        $pattern1 = 'Controller$';
        $directories1 = array('app/controller', 'app/lib');

        $pattern2 = 'Model$';
        $directories2 = array('app/models', 'app/model', 'app/lib/model', 'app/db');

        $pattern3 = 'Helper$';
        $directories3 = array('app/helpers');

        return array(
                array($pattern1, $directories1),
                array($pattern2, $directories2),
                array($pattern3, $directories3)
            );
    }

    public function tearDown() {
        unset($this->loader);
    }

}
