<?php
require_once __DIR__ .'/vendor/autoload.php';

class User {
    private $name;
    private $age;
    private $email;

    public function __construct($name, $age, $email) {
        $this->setName($name);
        $this->setAge($age);
        $this->setEmail($email);
    }

    private function setName($name) {
        $this->name = $name;
    }

    private function setAge($age) {
        $this->age = $age;
    }

    private function setEmail($email) {
        $this->email = $email;
    }

    public function getAll() {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email
        ];
    }

    public function __call($method, $args) {
        if (strpos($method, 'set') === 0) {
            $property = lcfirst(substr($method, 3));
            if (property_exists($this, $property) && method_exists($this, $method)) {
                call_user_func_array([$this, $method], $args);
            } else {
                throw new CustomException("Метода $method не існує");
            }
        } else {
            throw new CustomException("Метода $method не існує");
        }
    }
}

class CustomException extends Exception {}

try {
    $user = new User("Zahar", 20, "zvozikov@gmail.com
");

    $user->setAge(20);

    $userData = $user->getAll();
    print_r($userData);
} catch (CustomException $e) {
    echo 'Помилка: ' . $e->getMessage();
}