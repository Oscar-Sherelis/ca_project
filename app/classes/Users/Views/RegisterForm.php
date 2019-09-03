<?php

namespace App\Users\Views;

class RegisterForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'register-form',
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',

                            'validate_text_lenght' => [
                                'validate_text_lenght' => 40
                            ]
                        ]
                    ],
                ],
                'surname' => [
                    'label' => 'Pavardė',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',

                            'validate_text_lenght' => [
                                'validate_text_lenght' => 40
                            ]
                        ]
                    ],
                ],
                'email' => [
                    'label' => 'el. paštas',
                    'type' => 'email',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_mail',
                        ]
                    ],
                ],
                'password' => [
                    'label' => 'Slaptažodis',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
                'phone' => [
                    'label' => 'Telefono numeris',
                    'type' => 'number',
                    'extra' => [
                        // 'validators' => [
                        //     'validate_not_empty' // validate number
                        // ]
                    ],
                ],
                'address' => [
                    'label' => 'Namų adresas',
                    'type' => 'text',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Registruotis',
                ],
            ],
            'validators' => [
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
