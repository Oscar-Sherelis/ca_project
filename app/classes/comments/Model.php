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
     * @param Comments $person
     * @return bool
     */
    public function insert(Comment $person)
    {
        return App::$db->insertRow($this->table_name, $person->getData());
    }

    /**
     * @param array $conditions
     * @return array
     */
    public function get($conditions = [])
    {
        // user
        $participants = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row_data) {
            $row_data['id'] = $row_id;
            $participants[] = new Comment($row_data);
        }
        return $participants;
    }

    /**
     * @param Participant $person
     * @return bool
     */
    public function update(Participant $person)
    {
        return App::$db->updateRow($this->table_name, $person->getId(), $person->getData());
    }

    /**
     * deletes all participants from database
     * @param Participant $person
     * @return bool
     */
    public function delete(Participant $person)
    {
        return App::$db->deleteRow($this->table_name, $person->getId());
    }

    public function __destruct()
    {
        App::$db->save();
    }

}