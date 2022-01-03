<?php
    require_once("php\classes\movies\movie.view.php");

    $movie = new MovieView();

    if (!empty($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] < 2147483647) {
        $id = (int)$_GET['id'];
    }else{
        header("location: ./404.php");
    }
?>

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

    <main class="main main--detail">
        <section class="detail">
                <?= $movie->showMovieDetail($id); ?>
        </section>
    </main>
    <?php require_once("./layouts/footer.php"); ?>
</body>

</html>
