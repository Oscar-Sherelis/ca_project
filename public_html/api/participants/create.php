<?php

use App\App;
date_default_timezone_set('Europe/Vilnius');

require '../../../bootloader.php';

// Check user authorization
if (!App::$session->userLoggedIn()) {
    $response = new \Core\Api\Response();
    $response->addError('You are not authorized!');
    $response->print();
}

// Filter received data
$form = (new \App\comments\Views\ApiForm())->getData();
$filtered_input = get_form_input($form);
validate_form($filtered_input, $form);

/**
 * If request passes validation
 * this function is automatically
 * called
 * @param type $filtered_input
 * @param type $form
 */
function form_success($filtered_input, $form) {
    $response = new \Core\Api\Response();

    $filtered_input['name'] = $_SESSION['name'];
    $today = date("Y-m-d H:i:s");
    $filtered_input['time'] = $today;

    $comment = new \App\comments\Comment($filtered_input);
    var_dump($filtered_input);
    $model = new \App\comments\Model();
    $id = $model->insert($comment);

    if ($id) {
        $comment->setId($id);
        $response->setData($comment->getData());
    } else {
        $response->addError('Insert to database failed!');
    }
    
    $response->print();
}

/**
 * If request fails validation
 * this function is automatically
 * called
 * 
 * @param type $filtered_input
 * @param type $form
 */
function form_fail($filtered_input, $form) {
    $response = new \Core\Api\Response();

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['error'])) {
            $response->addError($field['error'], $field_id);
        }
    }

    $response->print();
}
