<?php include_once('php\includes\session_start.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>FLETNIX</title>
    </head>

    <body class="body">
        <?php require_once("./layouts/header.php"); ?>

        <main class="main main--404">
            <h1>404</h1>
            <a href="./index.php">Ga terug naar home pagina</a>
        </main>
        <?php require_once("./layouts/footer.php"); ?>
    </body>

</html>
