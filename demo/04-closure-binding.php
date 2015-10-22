<?php
/**
 * Closure call-time binding
 *
 * @see http://php.net/manual/en/closure.call.php
 */
declare(strict_types=1);

header('Content-type: text/plain');

// Class definition
class Person
{
    protected $firstName;
    protected $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}

// Closure definition
$sayHelloTo = function ($otherPerson) {
    return sprintf(
        'Hello %s. My name is %s.',
        $otherPerson,
        $this->getFullName() // <-- References bound state
    );
};

// Invoke closure and bind state at same time
$person = new Person('Josh', 'Lockhart');
echo $sayHelloTo->call($person, 'Lisa');
