<?php
declare(strict_types=1);

header('Content-type: text/plain');

/**
 * Fetch random int
 *
 * An exception is thrown if CSPRNG cannot provide
 * a random number.
 *
 * Min and max values are INCLUSIVE.
 */
$max = filter_input(INPUT_GET, 'total', FILTER_SANITIZE_NUMBER_INT);
if ($max === false || $max === null) {
    echo 'Invalid total number' . PHP_EOL;
    exit;
}

try {
    $randomInt = random_int(1, (int)$max);
    echo 'Congratulatons, ' . $randomInt . '!' . PHP_EOL;
} catch (\Exception $e) {
    // Use fallback random number generator
}
