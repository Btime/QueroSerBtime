<?php
declare(strict_types = 1);

namespace App;

use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{
    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldGetException()
    {
        $word = new Word('Number1');
        $word->validate();
        $this->expectExceptionMessage('The string must contain only characters between a-z and A-Z.');
    }

    public function testShouldCalculateForTheWordTalk()
    {
        $word = new Word('Talk');
        $retrieveData = $word->calculate();
        $expectedData = 70;
        $this->assertEquals($expectedData, $retrieveData);
    }

    public function testShouldCheckIfTheTestWordIsPrime()
    {
        $word = new Word('Test');
        $retrieveData = $word->validate()->isPrime();
        $this->assertEquals(is_bool($retrieveData), true);
        $this->assertEquals($retrieveData, false);
    }

    public function testShouldCheckIfTheAffWordIsPrime()
    {
        $word = new Word('aff');
        $retrieveData = $word->validate()->isPrime();
        $this->assertEquals(is_bool($retrieveData), true);
        $this->assertEquals($retrieveData, true);
    }
}
