<?php
/**
 * PHP Throwable, Error, Exception
 *
 * - Errors are thrown when fatal and catchable fatal errors occur
 * - Root interface `\Throwable` that you personally cannot implement. Only implemented by `\Exception` and `\Error` classes
 *
 * \Throwable
 *     \Error
 *         \ArithmeticError
 *         \AssertionError
 *         \DivisionByZeroError
 *         \ParseError
 *         \TypeError
 *     \Exception
 *         \ErrorException
 *
 * - `AssertionError` when `assert()` fails
 * - `ParseError` is thrown when an error occurs while parsing PHP code, such as when eval() is called.
 * - `TypeError` is thrown when:
 *     - Argument type does not match method signature
 *     - Return type does not match method signature
 *     - Number of arguments passed into built-in PHP function (strict mode only)
 *
 * @see  http://php.net/manual/en/class.throwable.php
 * @see  http://php.net/manual/en/class.error.php
 * @see  http://php.net/manual/en/class.exception.php
*/
declare(strict_types=1);

header('Content-type: text/plain');

// Try to include file that does not exist
echo 'PHP 7.x ParseError' . PHP_EOL;
try {
    include "_syntax-error.php"; // <-- File has syntax error
} catch (\Error $error) {
    var_dump($error);
}
echo PHP_EOL;

// Invoke function with bad arguments
function sayHelloTo(string $otherPerson) : string {
    return 'Hello, ' . $otherPerson;
}
echo 'PHP 7.x TypeError' . PHP_EOL;
try {
    echo sayHelloTo(5.5);
} catch (\Error $error) {
    var_dump($error);
}
echo PHP_EOL;
