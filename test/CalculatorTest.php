<?php
/**
 * Created by PhpStorm.
 * User: deanoj
 * Date: 25/08/2014
 * Time: 14:38
 */

namespace Deanoj\TestProject1;

class CalculatorTest extends \PHPUnit_Framework_TestCase {
    public function testAdd()
    {
        $calc = new Calculator();

        $this->assertEquals(13, $calc->add(6,7));
        $this->assertEquals(7, $calc->add(4,3));
    }
}