<?php
declare(strict_types = 1);

namespace App;

use InvalidArgumentException;

class Word
{
    private $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function validate()
    {
        if (preg_match("/^[a-zA-Z]+$/", $this->word) !== 1) {
            throw new InvalidArgumentException('The string must contain only characters between a-z and A-Z.');
        }

        return $this;
    }

    public function calculate(): int
    {
        $letterValue = 0;

        $letter = new Letter;

        for ($i = 0; $i < mb_strlen($this->word); $i++) {
            $letterValue += $letter->checkValue($this->word[$i]);
        }

        return $letterValue;
    }

    public function isPrime(): bool
    {
        $value = $this->calculate();

        $prime = 0;

        for ($i = 1; $i <= $value; $i++) {
            if ($value % $i === 0) {
                $prime++;
            }
        }

        return $prime > 2 ? false : true;
    }
}
