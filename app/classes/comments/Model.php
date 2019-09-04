<?php

namespace App\Comments;

use \App\App;

class Model
{
    private $table_name = 'comments';

    public function __construct()
    {
        App::$db->createTable($this->table_name);
    }

    /**
     * saves comment into database
     * @param Comments $comment
     * @return bool
     */
    public function insert(Comment $comment)
    {
        return App::$db->insertRow($this->table_name, $comment->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = [])
    {
        $comments = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $comments[] = new Comment($row_data);
        }
        return $comments;
    }

    public function __destruct()
    {
        App::$db->save();
    }

}