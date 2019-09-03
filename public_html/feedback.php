<?php
require '../bootloader.php';

// use App\App;

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
        <div class="block">
            <?php print $createForm->render();?>
        </div>
         <!-- Footer -->
        <footer>
            <?php print $footer->render();?>
        </footer>
        <script>
                let formData = new FormData(); // chooses input from form

                fetch("api/participants/getComments.php", {
                    method: "POST",
                    body: formData
            })
                    .then(response => {
                        response.json().then(data => {
                            console.log(data);
                            const tbody = document.querySelector("tbody");
                            data.comments.forEach(value => {
                                const tr = document.createElement("tr");
                                const td1 = document.createElement("td");
                                const td2 = document.createElement("td");
                                const td3 = document.createElement("td");

                                td1.append(value.name);
                                td2.append(value.time);
                                td3.append(value.comment);

                                tr.append(td1, td2, td3);
                                tbody.append(tr);
                            })

                        });
                    });
            
        </script>
        <script defer src="media/js/app.js"></script>
    </body>
</html>
