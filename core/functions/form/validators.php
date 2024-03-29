<?php

/**
 * @param array $filtered_input - $_POST input array
 * @param array $params - array = [password]
 * @param array $form - array to generate form
 */
function validate_fields_match($filtered_input, &$form, $params) {

    $match = true;
    foreach ($params as $field_id) {
        $ref_value = $ref_value ?? $filtered_input[$field_id];
        if ($ref_value != $filtered_input[$field_id]) {
            $match = false;
            break;
        }
    }
    
    if (!$match) {
        $form['fields'][$field_id]['error'] = 'Laukai nesutampa!';
        return false;
    }
    return true;
}

function validate_text_lenght($field_value, &$field) {
    if (strlen($field_value) > $field['extra']['validators']['validate_text_lenght']['validate_text_lenght']) {
        $field['error'] = 'Laukas negali būti didesnis nei';
    } else {
        return true;
    }
}

function validate_not_empty($field_value, &$field) {
    if (strlen($field_value) == 0) {
        $field['error'] = 'Laukas negali būti tuščias';
    } else {
        return true;
    }
}

function validate_is_number($field_value, &$field) {
    if (!is_numeric($field_value)) {
        $field['error'] = 'Įveskite skaičių!';
    } else {
        return true;
    }
}

function validate_not_number($field_value, &$field) {
    if (is_numeric($field_value)) {
        $field['error'] = 'Skačiai draužiami!';
    } else {
        return true;
    }
}

function validate_is_positive($field_value, &$field) {
    if ($field_value < 0) {
        $field['error'] = 'Įveskite teigiamą skaičių.';
    } else {
        return true;
    }
}