<?php
    require_once("./php/classes/movies/movie.view.php");

    $movie = new MovieView();
    $selectedGenres = [];
    $titleInput = $_GET['movietitle'];

    function showGenres($genres) {
        $html = null;

        if (!empty($genres['genre'])) {
            foreach($genres['genre'] as $genre){
                global $selectedGenres;
                $selectedGenres[] = $genre;
                $html .= <<<HTML
                    <div class="header header__button header header__button--vivid-sky-blue">
                        {$genre}
                    </div>
                HTML;
            }
        }

        return $html;
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

<body class="body body--overzicht">
    <?php require_once("./layouts/header.php"); ?>

    <aside class="filter">
        <!-- <h1 class="filter--title"><?= $title; ?></h1> -->
        <div class="filter--container">
            <form method="GET">
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
                            <option disabled selected>Select your Genres</option>
                            <option value="Action">Action</option>
                            <option value="Adventure">Adventure</option>
                            <option value="Drama">Drama</option>
                            <option value="Sport">Sport</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="format" class="filter__label">Format</label>
                    <select class="filter__input filter__input--white" name="genre" id="format">
                        <option disabled selected>Select your Type</option>
                        <option value="Movie">Movie</option>
                        <option value="Serie">Series</option>
                    </select>
                </div>
                <div>
                    <label for="year" class="filter__label">Year</label>
                    <select class="filter__input filter__input--white" id="year" name="year">
                        <option disabled selected>Select year</option>
                        <option value="1970">1970</option>
                        <option value="1971">1971</option>
                        <option value="1972">1972</option>
                        <option value="1973">1973</option>
                        <option value="1974">1974</option>
                        <option value="1975">1975</option>
                        <option value="1976">1976</option>
                        <option value="1977">1977</option>
                        <option value="1978">1978</option>
                        <option value="1979">1979</option>
                        <option value="1980">1980</option>
                        <option value="1981">1981</option>
                        <option value="1982">1982</option>
                        <option value="1983">1983</option>
                        <option value="1984">1984</option>
                        <option value="1985">1985</option>
                        <option value="1986">1986</option>
                        <option value="1987">1987</option>
                        <option value="1988">1988</option>
                        <option value="1989">1989</option>
                        <option value="1990">1990</option>
                        <option value="1991">1991</option>
                        <option value="1992">1992</option>
                        <option value="1993">1993</option>
                        <option value="1994">1994</option>
                        <option value="1995">1995</option>
                        <option value="1996">1996</option>
                        <option value="1997">1997</option>
                        <option value="1998">1998</option>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>
                </div>
                <div>
                    <label for="airing" class="filter__label">Airing</label>
                    <div class="filter__input--wrap">
                        <select name="airing" class="filter__input filter__input--white" id="airing">
                            <option disabled selected>Select Airing</option>
                            <option value="airing">Airing</option>
                            <option value="finished">Finished</option>
                            <option value="not_aired">Not Yet Aired</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="filter__input--wrap">
                        <input name="submit" type="submit" id="submit" class="filter__input">
                    </div>
                </div>
            </form>
        </div>
        <?= showGenres($_GET); ?>
    </aside>

    <main class="main main--overzicht">
        <div class="row row__container--overzicht">
            <div class="row__grid row_
            _grid--overzicht">
                <?= $movie->showAllMovies($titleInput, $selectedGenres); ?>
            </div>
        </div>
    </main>
    <?php require_once("./layouts/footer.php"); ?>
</body>

</html>
