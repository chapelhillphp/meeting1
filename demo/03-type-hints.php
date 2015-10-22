<?php
/**
 * Type hints in PHP 7
 *
 * === OVERVIEW ===
 *
 * You can now type hint scalar values used
 * as function and method arguments.
 *
 * - int
 * - string
 * - float
 * - bool
 *
 * You can also type hint function and method
 * return types.
 *
 * Great way for code to be self-documenting
 * in a way. Also makes your code more stable
 * and more predictable by catching problems
 * earlier in the development process.
 *
 * === ENFORCE TYPE HINTS ===
 *
 * You MUST include `declare(strict_types=1);` as the first
 * statement in your PHP file. This activates type hint
 * enforcement _in this file_.
 *
 * If you omit this statement, PHP will fallback to its
 * traditional type coercion as seen in PHP 5.x.
 *
 * @see  http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration
 */
declare(strict_types=1);

header('Content-type: text/plain');

// Scalar type hints
function authenticate(string $username, string $password) : bool {
    if ($username === 'admin' && $password === 'password') {
        return true;
    }

    return false;
};

$testResult1 = authenticate('admin', 'password');
echo 'Success' . PHP_EOL;
var_dump($testResult1);
echo PHP_EOL;

$testResult2 = authenticate('josh', 'sekrit');
echo 'Denied' . PHP_EOL;
var_dump($testResult2);
echo PHP_EOL;

echo 'Invalid argument type' . PHP_EOL;
try {
    authenticate(2.3, 'password');
} catch (\TypeError $error) {
    var_dump($error);
}
