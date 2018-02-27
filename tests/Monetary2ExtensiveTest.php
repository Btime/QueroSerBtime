<?php

/** Test of Monetary2Extensive */

namespace tests;

use src\Monetary2Extensive;

//call class from lib phpunit
class Monetary2ExtensiveTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function testValue2String(){

        $monetaryExtensive = new Monetary2Extensive();

        //test the main method
        $expected = "vinte reais";
        $monetaryExtensive->setValue("20");
        $result = $monetaryExtensive->Value2String();
        //performs a basic writing test
        $this->assertEquals( $expected, $result );
    }

    /** @test */
    public function testGetValue(){
        $monetaryExtensive = new Monetary2Extensive();
        $monetaryExtensive->setValue("20");
        $expected = "20";
        $result = $monetaryExtensive->getValue();
        $this->assertEquals( $expected, $result );
    }

    /** @test */

    public function testCorrectedFormattedValue(){
        $monetaryExtensive = new Monetary2Extensive();
        $expected = 20200.00;
        $result = $monetaryExtensive->correctedFormattedValue("20.200,00");
        $this->assertEquals( $expected, $result );
    }
}
?>