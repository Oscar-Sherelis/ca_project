<?php

require '../bootloader.php';

// use App\App;

$createForm = new \App\Comments\Views\CreateForm();
$navigation = new \App\Views\Navigation();
$footer = new \App\Views\Footer();

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sport club</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/milligram.min.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <header>
            <?php print $navigation->render();?>
        </header>
        <!-- container -->
        <section class="container">
            <div id="person-table" class="block">
                <table>
                Atsiliepimai
                    <thead>
                        <tr>
                            <th>Vardas</th>
                            <th>Laikas</th>
                            <th>Komentaras</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Rows Are Dynamically Populated -->
                    </tbody>
                </table>
        </section>
        </div>
        <?php if(isset($_SESSION['email']) && isset($_SESSION['password'])): ?>
            <div class="block">
                <?php print $createForm->render();?>
            </div>
        <?php else: ?>
            <a id="leave-comment" href="register.php">Norite parašyti komentarą? Užsiregistruokite</a>
        <?php endif; ?>
         <!-- Footer -->
        <footer>
            <?php print $footer->render();?>
        </footer>
        <script defer src="media/js/comments.js"></script>
        <script defer src="media/js/app.js"></script>
    </body>
</html>
