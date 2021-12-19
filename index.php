<?php
    require_once("./htmlgenerator.php");
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
        <?= require_once("./layouts/header.php"); ?>
        <main class="main">
            <section class="content">
                <?= tekenThumbnails(); ?>
            </section>

            <section class="row">
                <div class="row__flex row__flex--align-center">
                    <h2 class="row__title">TOP RATED</h2>

                    <a href="./overzicht.html" class="row__see-al-link">
                        <div class="row__see-al-link--hover">
                            See all
                        </div>
                    </a>
                </div>
                <div class="row__grid">
                    <?= tekenCards(5); ?>
                </div>
            </section>

            <section class="row">
                <div class="row__flex row__flex--align-center">
                    <h2 class="row__title">Action</h2>
                    <a href="./overzicht.html" class="row__see-al-link">
                        <div class="row__see-al-link--hover">
                            See all
                        </div>
                    </a>
                </div>
                <div class="row__grid">
                    <?= tekenCards(5); ?>
                </div>
            </section>
        </main>
        <?= require_once("./layouts/footer.php"); ?>
    </body>
</html>
