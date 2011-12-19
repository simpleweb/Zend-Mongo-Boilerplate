<?php
class DefaultTest extends PHPUnit_Framework_TestCase
{

    public function setUp() {
        $this->reloadModels();
    }

    private function reloadModels()
    {
    }

    public function testMyTest()
    {
        $this->assertEquals(1, 1);
    }
}