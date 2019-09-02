<?php

namespace App\Users;

class User
{
    private $data = [];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'email' => null,
                'password' => null
            ];
        }
    }

    public function setData($array)
    {
        $this->setEmail($array['email'] ?? null);
        $this->setPassword($array['password'] ?? null);
        $this->setId($array['id'] ?? null);
        $this->setName($array['name'] ?? null);
        $this->setSurname($array['surname'] ?? null);
    }

    public function getData()
    {
        return [
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),

        ];
    }


    public function setEmail(String $email)
    {
        $this->data['email'] = $email;
    }

    public function setPassword(String $password)
    {
        $this->data['password'] = $password;
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function getPassword()
    {
        return $this->data['password'];
    }

    public function getId()
    {
        return $this->data['id'] ?? null;
    }

    // if set(int $id), maybe because it is string??? !!!
    public function setId($id)
    {
        $this->data['id'] = $id;
    }

    public function getName()
    {
        return $this->data['name'] ?? null;
    }

    public function setName(String $name)
    {
        $this->data['name'] = $name;
    }

    public function getSurname()
    {
        return $this->data['surname'] ?? null;
    }

    public function setSurname(String $surname)
    {
        $this->data['surname'] = $surname;
    }
}