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
        $this->setId($array['id'] ?? null);
        $this->setName($array['name'] ?? null);
        $this->setSurname($array['surname'] ?? null);
        $this->setEmail($array['email'] ?? null);
        $this->setPassword($array['password'] ?? null);
        $this->setPhone($array['phone'] ?? null);
        $this->setAddress($array['address'] ?? null);
        $this->setComment($array['comment'] ?? null);
    }

    public function getData()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'surname' => $this->getSurname(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'phone' => $this->getPhone(),
            'address' => $this->getAddress()
        ];
    }

    public function setEmail(String $email)
    {
        $this->data['email'] = $email;
    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function setPassword(String $password)
    {
        $this->data['password'] = $password;
    }

    public function getPassword()
    {
        return $this->data['password'];
    }

    public function setId($id)
    {
        $this->data['id'] = $id;
    }

    public function getId()
    {
        return $this->data['id'] ?? null;
    }

    public function setName(String $name)
    {
        $this->data['name'] = $name;
    }

    public function getName()
    {
        return $this->data['name'] ?? null;
    }

    public function setSurname(String $surname)
    {
        $this->data['surname'] = $surname;
    }

    public function getSurname()
    {
        return $this->data['surname'] ?? null;
    }

    public function setPhone($phone)
    {
        $this->data['phone'] = $phone;
    }

    public function getPhone()
    {
        return $this->data['phone'] ?? null;
    }

    public function setAddress(String $address)
    {
        $this->data['address'] = $address;
    }

    public function getAddress()
    {
        return $this->data['address'] ?? null;
    }

    public function setComment($comment)
    {
        $this->data['comment'] = $comment;
    }

    public function getComment()
    {
        return $this->data['comment'] ?? null;
    }
}