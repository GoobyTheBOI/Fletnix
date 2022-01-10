<?php
    require_once("./php/classes/movies/movie.view.php");
    include_once('php\includes\session_start.inc.php');
    $movie = new MovieView();
    $selectedGenres = [];
    $titleInput = isset($_GET['movietitle']) ? $_GET['movietitle'] : '';
    $studio = isset($_GET['studio']) ? $_GET['studio'] : '';
    $publicationYear = isset($_GET['year']) ? $_GET['year'] : '';
    $language = isset($_GET['language']) ? $_GET['language'] : '';

    function showAllFilters() {
        global $titleInput;
        global $studio;
        global $publicationYear;
        global $language;

        $html = null;

        $html .= showFilter($titleInput);

        if (!empty($_GET['genre'])) {
            foreach($_GET['genre'] as $genre){
                global $selectedGenres;
                $selectedGenres[] = $genre;
                $html .= <<<HTML
                    <div class="filter__button">
                        {$genre}
                    </div>
                HTML;
            }
        }

        $html.= showFilter($language);

        $html.= showFilter($studio);

        $html.= showFilter($publicationYear);

        return $html;
    }

    function showFilter($filter) {
        if (!empty($filter)) {
            return <<<HTML
                <div class="filter__button">
                    {$filter}
                </div>
            HTML;
        }
    }

    function showMovies($titleInput, $selectedGenres, $studio, $publicationYear, $language){
        global $movie;

        // if(empty($_GET['movietitle'])) {}

        return $movie->showAllFilteredMovies($titleInput, $selectedGenres, $studio, $publicationYear, $language);
    }

?>

<?php require_once("./layouts/head.php"); ?>

<body class="body body--overzicht">
    <?php require_once("./layouts/header.php"); ?>

    <aside class="filter">
            <form class="filter--container" method="GET">
                <div>
                    <label for="movietitle" class="filter__label">Movie Title</label>
                    <div class="filter__input--wrap">
                        <input name="movietitle" type="text" id="movietitle" class="filter__input">
                    </div>
                </div>
                <div>
                    <label for="genre" class="filter__label">Genre</label>
                    <div class="filter__input--wrap">
                        <select class="filter__input filter__input--white" name="genre[]" id="genre" multiple>
                            <?= $movie->showAllGenres(); ?>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="studio" class="filter__label">Studio</label>
                    <select class="filter__input filter__input--white" name="studio" id="studio">
                        <option disabled selected>Select your Type</option>
                        <?= $movie->showAllStudios(); ?>
                    </select>
                </div>
                <div>
                    <label for="year" class="filter__label">Year</label>
                    <select class="filter__input filter__input--white" id="year" name="year">
                        <option disabled selected>Select year</option>
                        <?= $movie->showAllYears(); ?>
                    </select>
                </div>
                <div>
                    <label for="airing" class="filter__label">Language</label>
                    <div class="filter__input--wrap">
                        <select name="language" class="filter__input filter__input--white" id="language">
                            <option disabled selected>Select Language</option>
                            <?= $movie->showAllLanguage(); ?>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="filter__input--wrap">
                        <input type="submit" value="Submit" id="submit" class="filter__input">
                    </div>
                </div>
            </form>
        <?= showAllFilters(); ?>
    </aside>

    <main class="main main--overzicht">
        <div class="row row__container--overzicht">
            <div class="row__grid row__grid--overzicht row__grid--filter-overzicht row_
            _grid--overzicht">
                <?= showMovies($titleInput, $selectedGenres, $studio, $publicationYear, $language); ?>
            </div>
        </div>
    </main>
    <?php require_once("./layouts/footer.php"); ?>
</body>

</html>
