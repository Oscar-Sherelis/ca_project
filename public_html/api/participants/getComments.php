<?php

require '../../../bootloader.php';

$model = new \App\Comments\Model();

$conditions = $_POST ?? [];

$result = [
    'comments' => [],
    'errors' => []
];

$participants = $model->get($conditions);
if ($participants !== false) {
    foreach ($participants as $person) {
        $result['comments'][] = $person->getData();
    }
} else {
    $result['errors'][] = 'Could not pull data from database!';
}

print(json_encode($result));