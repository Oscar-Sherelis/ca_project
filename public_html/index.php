<?php
require '../bootloader.php';

use App\App;

$createForm = new \App\Comments\Views\CreateForm();
$updateForm = new \App\Comments\Views\UpdateForm();
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
        <!-- main photo -->
        <section class="main-photo">
        </section>
        <!-- container -->
        <section class="container">
            <div class="container-wrapper">
                <div class="service">
                    <div class="service-image"></div>
                    <h4>Paslauga</h4>
                    <p>Paslaugos aprašymas</p>
                </div>
                <div class="service">
                    <div class="service-image"></div>
                    <h4>Paslauga</h4>
                    <p>Paslaugos aprašymas</p>
                </div>
                <div class="service">
                    <div class="service-image"></div>
                    <h4>Paslauga</h4>
                    <p>Paslaugos aprašymas</p>
                </div>
            </div>
        </section>
        <!-- google map -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.2194261566747!2d25.33569661534373!3d54.723355078378496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010221!5e0!3m2!1spl!2slt!4v1567494641498!5m2!1spl!2slt"
        frameborder="0"
        allowfullscreen="">
        </iframe>
        <!-- Footer -->
        <footer>
            <?php print $footer->render();?>
        </footer>
        <script defer src="media/js/app.js"></script>
    </body>
</html>
