<?php
    require_once("./htmlgenerator.php");
    require_once("php\classes\movies\movie.view.php");

    $movie = new MovieView();
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
        <main class="main">
            <section class="content">
                <?= drawThumbnails(); ?>
            </section>

            <section class="row">
                <div class="row__flex row__flex--align-center">
                    <h2 class="row__title">TOP RATED</h2>

                    <a href="./overzicht.php?title=top rated" class="row__see-al-link">
                        <div class="row__see-al-link--hover">
                            See all
                        </div>
                    </a>
                </div>
                <div class="row__grid">
                    <?= $movie->show5TopRated() ?>
                </div>
            </section>

            <section class="row">
                <div class="row__flex row__flex--align-center">
                    <h2 class="row__title">Action</h2>
                    <a href="./overzicht.php?title=action&genre[]=action" class="row__see-al-link">
                        <div class="row__see-al-link--hover">
                            See all
                        </div>
                    </a>
                </div>
                <div class="row__grid">
                    <?= $movie->show5TopRatedGenre("Action") ?>
                </div>
            </section>
        </main>
        <?php require_once("./layouts/footer.php"); ?>
    </body>
</html>
