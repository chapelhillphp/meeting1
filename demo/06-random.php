<?php
/**
 * PHP 7 gets a new cryptographically secure pseudo-random number generator (CSPRNG)
 *
 * The old `rand()` functions are know to be insecure. The `mcrypt_*` functions
 * and their underlying Mcrypt lib have been unmaintained for years.
 *
 * PHP's new `random_bytes()` and `random_int()` functions now rely on
 * native OS CSPRNGs.
 *
 * @see http://php.net/manual/en/function.random-bytes.php
 * @see http://php.net/manual/en/function.random-int.php
 * @see https://www.sammyk.me/security-changes-to-the-php-7-csprng-in-rc3
 */
declare(strict_types=1);

header('Content-type: text/plain');

/**
 * Fetch random bytes
 *
 * An exception is thrown if CSPRNG cannot provide
 * sufficient number of bytes to satisfy request.
 *
 * Use ths to generate secure salts or initialization vectors
 * for encryption.
 */
try {
    $randomBytes = random_bytes(64);
    var_dump(bin2hex($randomBytes)); // <-- Convert binary data into hexadecimal string
    echo PHP_EOL;
} catch (\Exception $e) {
    // Use fallback random bytes generator
}

/**
 * Fetch random int
 *
 * An exception is thrown if CSPRNG cannot provide
 * a random number.
 *
 * Min and max values are INCLUSIVE.
 */
try {
    $randomInt = random_int(0, 99);
    echo $randomInt . PHP_EOL;
} catch (\Exception $e) {
    // Use fallback random number generator
}
