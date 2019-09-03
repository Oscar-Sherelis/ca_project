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
     * Updates database
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        return App::$db->updateRow($this->table_name, $user->getId(), $user->getData());
    }

    /**
     * Delete user
     * @param User $user
     * @return bool
     */
    public function delete(User $user)
    {
        App::$db->deleteRow($this->table_name, $user->getId());
    }

    public function deleteAll() {
        App::$db->truncateTable($this->table_name);
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