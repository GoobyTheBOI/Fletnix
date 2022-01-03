<?php
require_once("dbh.class.php");

class Movie extends Dbh {
    protected function getTopRated() {
        $query = "SELECT TOP 5 Film.FilmID, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                INNER JOIN Genre
                    ON Genre.GenreID = Film.GenreID
                INNER JOIN Studio
	                ON Film.StudioID = Studio.StudioID";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();


        return $results;
    }

    protected function getTopRatedGenre($genre) {
        $query = "SELECT Film.FilmID, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                INNER JOIN Genre
                    ON Genre.GenreID = Film.GenreID
                INNER JOIN Studio
	                ON Film.StudioID = Studio.StudioID
                WHERE Genre.Genre = '$genre'";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getMovieDetail($id) {
        $query = "SELECT Film.FilmID, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio, Film.RunTimeMinutes, Film.BudgetDollars, Film.OscarNominations, Film.OscarWins, Director.FullName AS 'Director Fullname' FROM Film
                INNER JOIN Genre
                    ON Genre.GenreID = Film.GenreID
                INNER JOIN Studio
                    ON Film.StudioID = Studio.StudioID
                INNER JOIN Country
                    ON Country.CountryID = Film.CountryID
                INNER JOIN Language
                    ON Language.LanguageID = Film.LanguageID
                INNER JOIN Certificate
                    ON Certificate.CertificateID = Film.CertificateID
                INNER JOIN Director
                    ON Director.DirectorID = Film.DirectorID
                WHERE Film.FilmID = $id";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getActors($id){
        $query = "SELECT Actor.FullName AS 'Actor Fullname', Role.Role FROM Film
                INNER JOIN Role
                    ON Role.FilmID = Film.FilmID
                INNER JOIN Actor
                    ON Role.ActorID = Actor.ActorID
                WHERE Film.FilmID = $id";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getRecomendations($id, $genre) {
        $query = "SELECT TOP 10 Film.FilmID, Film.Title FROM Film
                INNER JOIN Genre
                    ON Genre.GenreID = Film.GenreID
                WHERE Film.FilmID <> $id and Genre.Genre = '$genre'";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }
}
