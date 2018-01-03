<?php
declare(strict_types = 1);

namespace App;

use Exception;

class Letter
{
    const FIRST_LOWERCASE_VALUE = 1;
    const FIRST_UPPERCASE_VALUE = 27;

    public function checkValue(string $letter): int
    {
        $currentLetter = ctype_lower($letter) ? 'a' : 'A';

        $value = $currentLetter === 'a' ? self::FIRST_LOWERCASE_VALUE : self::FIRST_UPPERCASE_VALUE;

        while ($currentLetter !== $letter) {
            $currentLetter++;
            $value++;
        }

        return $value;
    }
}
