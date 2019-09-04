<?php

require '../../../bootloader.php';

$model = new \App\comments\Model();

$conditions = $_POST ?? [];

$result = [
    'comments' => [],
    'errors' => []
];

$comments = $model->get($conditions);
if ($comments !== false) {
    foreach ($comments as $person) {
        $result['comments'][] = $person->getData();
    }
} else {
    $result['errors'][] = 'Could not pull data from database!';
}

print(json_encode($result));