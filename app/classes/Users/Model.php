<?php

namespace App\Users;
use \App\App;

class Model
{

    private $table_name = 'users';

    public function __construct()
    {
        App::$db->createTable($this->table_name);
    }

    /** Insert user into database
     * @param User $user
     */
    public function insert(User $user) {
        return App::$db->insertRow($this->table_name, $user->getData());
    }

    /**
     * Gets data by our conditions
     * @param array $conditions
     * @return User[]
     */
    public function get($conditions = []) {
        $users = [];
        $rows = App::$db->getRowsWhere($this->table_name, $conditions);
        foreach ($rows as $row_id => $row) {
            $row['id'] = $row_id;
            $users[] = new User($row);
        }
        return $users;
    }

    /**
     * before ending all tasks saves all changes in database
     */
    public function __destruct()
    {
        App::$db->save();
    }
}

?>