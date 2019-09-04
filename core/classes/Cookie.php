<?php

namespace Core;

class Cookie
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function exists(): bool
    {
        if (isset($_COOKIE[$this->name])) {
            return true;
        } else {
            return false;
        }
    }

    public function read(): array
    {
        $array = json_decode($_COOKIE[$this->name], true);
        if ($array) {
            return $array;
        } else {
            trigger_error('Nepavyko dekodinti Bl*t!', E_USER_WARNING);
        }
        return [];
    }

    
    public function save(array $data, int $expires_in = 3600): void
    {
        $string = json_encode($data);
        setcookie($this->name, $string, time() + $expires_in, "/");
    }

    public function delete(): void
    {
        unset($_COOKIE[$this->name]);
        setcookie($this->name, null, -1, "/");
    }
}