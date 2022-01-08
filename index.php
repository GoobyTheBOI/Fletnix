<?php
    require_once("./htmlgenerator.php");
    require_once("php\classes\movies\movie.view.php");
    include_once('php\includes\session_start.inc.php');

    $movie = new MovieView();


    function movieTitle($title, $link) {
        $html;

        $html .= <<<HTML
            <div class="row__flex row__flex--align-center">
                <h2 class="row__title">{$title}</h2>
                <a href="{$link}" class="row__see-al-link">
                    <div class="row__see-al-link--hover">
                        See all
                    </div>
                </a>
            </div>
        HTML;

        return $html;
    }
?>

<?php require_once("./layouts/head.php"); ?>
    <body class="body">
        <?php require_once("./layouts/header.php"); ?>
        <main class="main">
            <section class="content">
                <?= $movie->show3Reviews(); ?>
            </section>

            <section class="row">
                <?= movieTitle("Top Rated", "./overzicht.php"); ?>
                <div class="row__grid">
                    <?= $movie->show5TopRated() ?>
                </div>
            </section>

            <section class="row">
                <?= movieTitle("Action", "./overzicht.php?genre[]=action"); ?>
                <div class="row__grid">
                    <?= $movie->show5TopRatedGenre("Action") ?>
                </div>
            </section>
        </main>
        <?php require_once("./layouts/footer.php"); ?>
    </body>
</html>
