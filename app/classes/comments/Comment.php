<?php

namespace App\Comments;

class Comment
{
    private $data = [];

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->data = [
                'id' => null,
                'name' => null,
                'time' => null,
                'commnts' => null,
            ];
        }
    }

    /**
     ** Sets all data from array
     * @param $array
     */
    public function setData($array)
    {
        if (isset($array['id'])) {
            $this->setId($array['id']);
        } else {
            $this->data['id'] = null;
        }
        $this->setName($array['name'] ?? null);
        $this->setTime($array['time'] ?? null);
        $this->setComment($array['comment'] ?? null);
    }


    /**
     * Gets all data as array
     * @return array
     */
    public function getData()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'time' => $this->getTime(),
            'comment' => $this->getComment(),
        ];
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    /**
     * @return id
     */
    public function getId()
    {
        return $this->data['id'];
    }

    /**
     * Sets name
     * @param string $name
     */
    public function setName($name)
    {
        $this->data['name'] = $name;
    }

    /**
     * Returns name
     * @return string
     */
    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * Sets time
     * @param string $time
     */
    public function setTime($time)
    {
        $this->data['time'] = $time;
    }

    /**
     * Return time
     * @return string
     */
    public function getTime()
    {
        return $this->data['time'];
    }

    /**
     * Sets comment
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->data['comment'] = $comment;
    }

    /**
     * Return comment
     * @return string
     */
    public function getComment()
    {
        return $this->data['comment'];
    }
}