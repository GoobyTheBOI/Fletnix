<?php
require_once("movie.class.php");

class MovieView extends Movie {
    public function show5TopRated() {
        $results = $this->get5TopRated();

        $html = null;
        foreach ($results as $movie) {
            $season = $this->dateToSeason($movie["ReleaseDate"]);
            $year = $this->dateToYear($movie["ReleaseDate"]);
            $html.= <<<HTML
                <a href="./filmdetail.php?id={$movie['FilmID']}">
                    <article class="card">
                        <img class="card__image card__image" src="./images/cover.jpg" alt="cover">

                        <h2 class="card__title card__title--hover">
                            {$movie["Title"]}
                        </h2>

                        <div class="card__hover-data card__hover-data--right">
                            <div class="card__hover-data__header">
                                {$season} {$year}
                            </div>

                            <div class="card__hover-data__studio">
                                {$movie["Studio"]}
                            </div>

                            <div class="card__hover-data__genres">
                                <div class="card__hover-data__genres--genre">{$movie["Genre"]}</div>
                            </div>
                        </div>
                    </article>
                </a>
            HTML;
        }

        return $html;
    }

    protected function dateToSeason($date){
        $dateToString = strtotime($date);
        $day =  date('z', $dateToString) + 1;

        if($day < 80 || $day > 356){
            return 'Winter';
        }
        if($day < 173){
            return 'Spring';
        }
        if($day < 266){
            return 'Summer';
        }
        return 'Fall';
    }

    protected function dateToYear($date) {
        $dateToString = strtotime($date);
        return date('Y', $dateToString);
    }

    public function show5TopRatedGenre($genre) {
        $results = $this->get5TopRatedGenre($genre);

        $html = null;
        foreach ($results as $movie) {
            $season = $this->dateToSeason($movie["ReleaseDate"]);
            $year = $this->dateToYear($movie["ReleaseDate"]);
            $html.= <<<HTML
                <a href="./filmdetail.php?id={$movie['FilmID']}">
                    <article class="card">
                        <img class="card__image card__image" src="./images/cover.jpg" alt="cover">

                        <h2 class="card__title card__title--hover">
                            {$movie["Title"]}
                        </h2>

                        <div class="card__hover-data card__hover-data--right">
                            <div class="card__hover-data__header">
                                {$season} {$year}
                            </div>

                            <div class="card__hover-data__studio">
                                {$movie["Studio"]}
                            </div>

                            <div class="card__hover-data__genres">
                                <div class="card__hover-data__genres--genre">{$movie["Genre"]}</div>
                            </div>
                        </div>
                    </article>
                </a>
            HTML;
        }

        return $html;
    }

    public function showMovieDetail($id){
        $results = $this->getMovieDetail($id);
        $actors = $this->getActors($id);

        $html = null;
        $movie = $results[0];

        $recomendations = $this->getRecomendations($id, $movie['Genre']);

        $html.= <<<HTML
                    <div class="detail__image--background">
                        <div class="detail__image--shadow"></div>
                    </div>
                    <div class="detail__container">
                        <img class="detail__image detail__image--cover" src="./images/cover.jpg" alt="logo">

                        <div class="detail__header-content">
                            <h1 class="detail__title">{$movie['Title']}</h1>
                            <p class="detail__description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident distinctio vero ea perferendis asperiores itaque magnam architecto vel nesciunt ab ullam, sunt eos placeat autem illo cupiditate tempora corporis sint!
                            </p>
                        </div>
                    </div>

                    <div class="detail__container detail__container--image">
                        <aside class="detail--padding-top detail__info">
                            <div class="detail__info--blue">
                                <div class="detail__info-text detail__data-set">
                                    <div class="detail__type">Type</div>
                                    <div class="detail__value">Movie</div>
                                </div>
                                <div class="detail__info-text detail__data-set">
                                    <div class="detail__type">Episodes</div>
                                    <div class="detail__value">1</div>
                                </div>
                                <div class="detail__info-text detail__data-set">
                                    <div class="detail__type">Genre</div>
                                    <div class="detail__value">{$movie['Genre']}</div>
                                </div>
                                <div class="detail__info-text detail__data-set">
                                    <div class="detail__type">Duration</div>
                                    <div class="detail__value">{$movie['RunTimeMinutes']}</div>
                                </div>
                                <div class="detail__info-text detail__data-set">
                                    <div class="detail__type">Release date</div>
                                    <div class="detail__value">{$movie['ReleaseDate']}</div>
                                    <!-- <div class="detail__value">20 nov, 2015</div> -->
                                </div>
                                <div class="detail__info-text detail__data-set">
                                    <div class="detail__type">Budget</div>
                                    <div class="detail__value">{$movie['BudgetDollars']}</div>
                                </div>
                                <div class="detail__info-text detail__data-set">
                                    <div class="detail__type">Oscar Wins</div>
                                    <div class="detail__value">{$movie['OscarWins']}</div>
                                </div>
                                <div class="detail__info-text detail__data-set">
                                    <div class="detail__type">Oscar Nominations</div>
                                    <div class="detail__value">{$movie['OscarNominations']}</div>
                                </div>
                            </div>
                        </aside>
                        <div>
                            <div class="detail--padding-top">
                                <h2 class="detail__title">Actors</h2>
                                <div class="detail__grid detail__grid--movie-info detail__grid--actor detail__grid--padding-top">

                HTML;

                foreach ($actors as $actor) {
                    $html.= <<<HTML
                            <article class="card">
                                <div class="detail__grid detail__grid--role-card">
                                    <img class="detail__image" src="./images/actor_and_staff.jpg"
                                        alt="cover">
                                    <div class="detail__movie-information">
                                        <h2 class="detail__actor">{$actor['Actor Fullname']}</h2>
                                        <p class="detail__actor detail__actor--name">as {$actor['Role']}</p>
                                    </div>
                                </div>
                            </article>
                    HTML;
                }

                $html.= <<<HTML
                        </div>
                    </div>
                    <div class="detail--padding-top">
                        <h2 class="detail__title">Director</h2>
                        <div class="detail__grid detail__grid--movie-info detail__grid--staff detail__grid--padding-top">
                            <article class="card">
                                <div class="detail__grid detail__grid--role-card">
                                    <img class="detail__image" src="./images/actor_and_staff.jpg" alt="cover">
                                    <div class="detail__movie-information">
                                        <h2 class="detail__actor">{$movie['Director Fullname']}</h2>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                    <div class="detail--padding-top">
                        <h2 class="detail__title">Trailer</h2>
                        <video class="detail__video" controls>
                            <source src="./trailer/trailer.mov" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
            HTML;

            $html.= <<<HTML
                <div class="detail--padding-top">
                    <h2 class="detail__title">Recomendations</h2>
                    <div class="detail__grid detail__grid--movie-info detail__grid--padding-top detail__grid--gap-small">
            HTML;

            foreach ($recomendations as $recomendation) {
                $html.= <<<HTML
                    <a href="./filmdetail.php?id={$recomendation['FilmID']}">
                        <article class="card">
                            <img class="detail__image detail__image--recomendation" src="./images/cover.jpg" alt="cover">
                            <h2 class="card__title card__title--hover">
                                {$recomendation['Title']}
                            </h2>
                        </article>

                    </a>
                HTML;
            }

            $html.= <<<HTML
                            </div>
                        </div>
                    </div>
                </div>
            HTML;

        return $html;
    }

    public function showAllFilteredMovies($title, $genres, $studio, $publicationYear, $language) {
        $markupGenre = implode("', '", $genres);
        $results = $this->getAllFilteredMovies($title, $markupGenre, $studio, $publicationYear, $language);

        $html = null;
        foreach ($results as $movie) {
            $season = $this->dateToSeason($movie["ReleaseDate"]);
            $year = $this->dateToYear($movie["ReleaseDate"]);
            $html.= <<<HTML
                <a href="./filmdetail.php?id={$movie['FilmID']}">
                    <article class="card">
                        <img class="card__image card__image" src="./images/cover.jpg" alt="cover">

                        <h2 class="card__title card__title--hover">
                            {$movie["Title"]}
                        </h2>

                        <div class="card__hover-data card__hover-data--right">
                            <div class="card__hover-data__header">
                                {$season} {$year}
                            </div>

                            <div class="card__hover-data__studio">
                                {$movie["Studio"]}
                            </div>

                            <div class="card__hover-data__genres">
                                <div class="card__hover-data__genres--genre">{$movie["Genre"]}</div>
                            </div>
                        </div>
                    </article>
                </a>
            HTML;
        }

        return $html;
    }

    public function showAllMovies() {
        $results = $this->getAllMovies();

        $html = null;
        foreach ($results as $movie) {
            $season = $this->dateToSeason($movie["ReleaseDate"]);
            $year = $this->dateToYear($movie["ReleaseDate"]);
            $html.= <<<HTML
                <a href="./filmdetail.php?id={$movie['FilmID']}">
                    <article class="card">
                        <img class="card__image card__image" src="./images/cover.jpg" alt="cover">

                        <h2 class="card__title card__title--hover">
                            {$movie["Title"]}
                        </h2>

                        <div class="card__hover-data card__hover-data--right">
                            <div class="card__hover-data__header">
                                {$season} {$year}
                            </div>

                            <div class="card__hover-data__studio">
                                {$movie["Studio"]}
                            </div>

                            <div class="card__hover-data__genres">
                                <div class="card__hover-data__genres--genre">{$movie["Genre"]}</div>
                            </div>
                        </div>
                    </article>
                </a>
            HTML;
        }

        return $html;
    }

    public function showAllGenres(){
        $results = $this->getAllGenres();

        $html = null;

        foreach ($results as $genre) {
            $html .= <<<HTML
                <option value="{$genre['Genre']}">{$genre['Genre']}</option>
            HTML;
        }

        return $html;
    }

    public function showAllYears(){
        $results = $this->getAllYears();

        $html = null;

        foreach ($results as $year) {
            $html .= <<<HTML
                <option value="{$year['Year']}">{$year['Year']}</option>
            HTML;
        }

        return $html;
    }

    public function showAllLanguage(){
        $results = $this->getAllLanguage();

        $html = null;

        foreach ($results as $language) {
            $html .= <<<HTML
                <option value="{$language['Language']}">{$language['Language']}</option>
            HTML;
        }

        return $html;
    }

    public function showAllStudios(){
        $results = $this->getAllStudios();

        $html = null;

        foreach ($results as $studio) {
            $html .= <<<HTML
                <option value="{$studio['Studio']}">{$studio['Studio']}</option>
            HTML;
        }

        return $html;
    }

    public function show3Reviews(){
        $results = $this->get3Reviews();

        $html = null;


        $html .=  $this->drawThumbnail("head-image", NULL, $results[0]);

        for ($i = 1; $i < count($results); $i++) {
            if($i == 1) {
                $html .= $this->drawThumbnail("sub-image", "margin-bottom-auto", $results[$i]);
            }

            if ($i == 2) {
                $html .= $this->drawThumbnail("sub-image", "margin-top-auto", $results[$i]);
            }
        }

        return $html;
    }

    protected function drawThumbnail($css_class, $margin_auto = NULL , $result){
        return <<<HTML
            <div class="thumbnail thumbnail--{$css_class} thumbnail--{$margin_auto}">
                <img class="content__image content__image--{$css_class}"
                    src="./images/thumbnail.png" alt="movie">

                <div class="thumbnail__information thumbnail__information--hover thumbnail__information--hover-{$css_class}">
                    <h3 class="thumbnail__title thumbnail__title--{$css_class}">{$result['Title']}</h3>
                    <div class="thumbnail__description thumbnail__description--{$css_class}">
                        <p>{$result['Review']}</p>
                    </div>
                </div>
            </div>
        HTML;
    }
}
