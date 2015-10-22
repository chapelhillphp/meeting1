<?php
/**
 * Spaceship operator
 *
 * Use for simple comparator functions with the `usort()`
 * and related functions.
 *
 * Easier to mentally map "<=>" to -1, 0, 1 respectively.
 *
 * @see http://php.net/manual/en/language.operators.comparison.php
 */
declare(strict_types=1);

header('Content-type: text/plain');

// PHP 5.x
$lettersOld = ['b', 'c', 'a'];
usort($lettersOld, function ($a, $b) {
    if ($a < $b) {
        return -1;
    }

    if ($a > $b) {
        return 1;
    }

    return 0;
});
echo 'PHP 5.x' . PHP_EOL;
var_dump($lettersOld) . PHP_EOL;

// PHP 7.x
$lettersNew = ['b', 'c', 'a'];
usort($lettersNew, function ($a, $b) {
    return $a <=> $b;
});
echo 'PHP 7.x' . PHP_EOL;
var_dump($lettersNew) . PHP_EOL;
