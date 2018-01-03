<?php
declare(strict_types = 1);

namespace App;

use PHPUnit\Framework\TestCase;

class LetterTest extends TestCase
{
    protected $letter;

    protected function setUp()
    {
        $this->letter = new Letter;
    }

    public function testShouldCheckValueForLetterA()
    {
        $retrieveData = $this->letter->checkValue('A');

        $expectedData = 27;

        $this->assertEquals($expectedData, $retrieveData);
    }

    public function testShouldCheckValueForLetterGlowercase()
    {
        $retrieveData = $this->letter->checkValue('g');

        $expectedData = 7;

        $this->assertEquals($expectedData, $retrieveData);
    }
}
