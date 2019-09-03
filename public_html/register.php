<?php
require '../bootloader.php';

$form = new \App\Users\Views\RegisterForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();

function form_success($filtered_input, &$form) {
    $user = new \App\Users\User($filtered_input);

    $model = new \App\Users\Model();
    $model->insert($user);

    $form['message'] = 'Registracija sekminga! Galite prisijungti!';
}

switch (get_form_action()) {
    case 'submit':
        $filtered_input = get_form_input($form->getData());
        $success = validate_form($filtered_input, $form->getData());
        break;

    default:
        $success = false;
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

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/milligram.min.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <!-- Header -->        
        <header>
            <?php print $navigation->render(); ?>
        </header>

        <!-- Main Content -->        
        <main class="register">
            <section class="wrapper">
                <div class="block">
                    <?php if ($success): ?>
                        <h1>Registracija sėkminga!</h1>
                        <p>
                            Galite prisijungti paspaudę <a href="/login.php">čia!</a>
                        </p>
                    <?php else: ?>
                        <h1>Registruotis:</h1>

                        <!-- Register Form -->
                        <?php print $form->render(); ?>
                    <?php endif; ?>
                </div>
            </section>
        </main>

        <!-- Footer -->        
        <footer>
            <?php print $footer->render(); ?>
        </footer>
    </body>
</html>
