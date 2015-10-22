<?php
/**
 * Null Coalesce Operator
 *
 * Great way to avoid ternary conditionals.
 * This operator assigns the first value
 * that is NOT NULL (and I mean NULL). It will
 * assign `0`, `false`, `"NULL"`, etc.
 *
 * @see  http://php.net/manual/en/language.operators.comparison.php
 */
declare(strict_types=1);

header('Content-type: text/plain');

$person = [
    'name' => 'Adam',
    'job' => 'Developer',
    'company' => 'Newfangled',
    'dob' => '1978-04-26', // <-- Wild guess...
];
$showFields = ['name', 'job', 'favoriteFood'];

// PHP 5.x
echo 'PHP 5.x' . PHP_EOL;
foreach ($showFields as $field) {
    $value1 = isset($person[$field]) ? $person[$field] : 'Unknown';
    echo $value1 . PHP_EOL;
}
echo PHP_EOL;

// PHP 7.x
echo 'PHP 7.x' . PHP_EOL;
foreach ($showFields as $field) {
    $value2 = $person[$field] ?? 'Unknown';
    echo $value2 . PHP_EOL;
}
echo PHP_EOL;

// PHP 7.x chaining
echo 'PHP 7.x with chaining' . PHP_EOL;
foreach ($showFields as $field) {
    $value3 = $person[$field] ?? null ?? 'Unknown';
    echo $value3 . PHP_EOL;
}
