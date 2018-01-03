<?php
declare(strict_types = 1);

namespace App;

use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{
    /**
     * @expectedException Exception
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

        $word->validate();

        $retrieveData = $word->calculate();

        $expectedData = 70;

        $this->assertEquals($expectedData, $retrieveData);
    }

    public function testShouldCheckIfTheTestWordIsPrime()
    {
        $word = new Word('Test');

        $word->validate();

        $value = $word->calculate();

        $expectedData = 'Its not prime';

        $retrieveData = $word->checkPrime($value);

        $this->assertEquals($expectedData, $retrieveData);
    }

    public function testShouldCheckIfTheAffWordIsPrime()
    {
        $word = new Word('aff');

        $word->validate();

        $value = $word->calculate();

        $expectedData = 'Its Prime';

        $retrieveData = $word->checkPrime($value);

        $this->assertEquals($expectedData, $retrieveData);
    }
}
