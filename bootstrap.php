<?php
declare(strict_types = 1);

$composerAutoload = __DIR__ . '/vendor/autoload.php';

if (file_exists($composerAutoload) === false) {
    trigger_error('Please, run the composer install. ', E_USER_ERROR);
}

require_once $composerAutoload;

$words = [
    'Talk',
    'aff',
    'Test',
    'Wednesday',
    'md'
];

for ($i=0; $i < count($words); $i++) {
    $word = new App\Word($words[$i]);

    try {
        $word->validate();

        $wordValue = $word->calculate();

        echo 'Value for "' . $words[$i] . '" word: ' . $wordValue . PHP_EOL;

        $prime = boolval($word->validate()->isPrime()) ? 'true' : 'false';
        echo 'Is it prime? ' . $prime . PHP_EOL . PHP_EOL;
    } catch (InvalidArgumentException $e) {
        echo $e->getMessage() . PHP_EOL;
    }
}
