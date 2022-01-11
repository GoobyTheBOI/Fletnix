<?php
require_once("dbh.class.php");

class Movie extends Dbh {
    protected function get5TopRated() {
        $query = "SELECT TOP 5 Film.FilmID, Film.Title, Film.ReleaseDate, Film.Img, Genre.Genre, Studio.Studio FROM Film
                INNER JOIN Genre
                    ON Genre.GenreID = Film.GenreID
                INNER JOIN Studio
	                ON Film.StudioID = Studio.StudioID
                WHERE Film.Review IS NOT NULL
                ORDER BY Film.avg_score DESC";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();


        return $results;
    }

    protected function getAllFilteredMovies($title, $genres, $studio, $publicationYear, $language) {
        // $genres;
        $queryResult = $this->filterQuery($title, $genres, $studio, $publicationYear, $language);

        $connection = $this->connect()->prepare($queryResult[0]);
        $connection->execute($queryResult[1]);

        $results = $connection->fetchAll();


        return $results;
    }

    private function filterQuery($title, $genres, $studio, $publicationYear, $language){
        $title = $this->isFilterValueEmpty($title);
        $studio = $this->isFilterValueEmpty($studio);
        $genres = "$genres";
        $language = "$language";

        $query = null;
        $execute = null;

        switch(true){
            case !empty($title) && !empty($genres) && !empty($studio) && !empty($publicationYear) && !empty($language):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    INNER JOIN Language
						ON Film.LanguageID = Language.LanguageID
                    WHERE Genre IN (:genres)
                    AND Language.Language = :language
                    AND Film.Title LIKE :title
                    AND Studio.Studio LIKE :studio
                    AND YEAR(Film.ReleaseDate) = :publicationYear";
                $execute = [$genres, $language, $title, $studio, $publicationYear];
                break;

            case !empty($title) && !empty($studio) && !empty($publicationYear) && !empty($language):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    INNER JOIN Language
						ON Film.LanguageID = Language.LanguageID
                    WHERE Language.Language = :language
                    AND Film.Title LIKE :title
                    AND Studio.Studio LIKE :studio
                    AND YEAR(Film.ReleaseDate) = :publicationYear";
                $execute = [$language, $title, $studio, $publicationYear];
                break;

            case !empty($studio) && !empty($publicationYear) && !empty($language):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    INNER JOIN Language
						ON Film.LanguageID = Language.LanguageID
                    WHERE Language.Language = :language
                    AND Studio.Studio LIKE :studio
                    AND YEAR(Film.ReleaseDate) = :publicationYear";
                $execute = [$language, $studio, $publicationYear];
                break;

            case !empty($title) && !empty($genres) && !empty($publicationYear) && !empty($language):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    INNER JOIN Language
						ON Film.LanguageID = Language.LanguageID
                    WHERE Genre IN (:genres)
                    AND Language.Language = :language
                    AND Film.Title LIKE :title
                    AND YEAR(Film.ReleaseDate) = :publicationYear";
                $execute = [$genres, $language, $title, $publicationYear];
                break;

            case !empty($title) && !empty($genres) && !empty($studio) && !empty($language):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    INNER JOIN Language
						ON Film.LanguageID = Language.LanguageID
                    WHERE Genre IN (:genres)
                    AND Language.Language = :language
                    AND Film.Title LIKE :title
                    AND Studio.Studio LIKE :studio";
                $execute = [$genres, $language, $title, $studio];
                break;

            case !empty($title) && !empty($genres) && !empty($studio) && !empty($publicationYear):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    INNER JOIN Language
						ON Film.LanguageID = Language.LanguageID
                    WHERE Genre IN (:genres)
                    AND Film.Title LIKE :title
                    AND Studio.Studio LIKE :studio
                    AND YEAR(Film.ReleaseDate) = :publicationYear";
                $execute = [$genres, $title, $studio, $publicationYear];
                break;

            case !empty($title) && !empty($genres) && !empty($studio):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    WHERE Genre IN (:genres)
                    AND Film.Title LIKE :title
                    AND Studio.Studio LIKE :studio";
                $execute = [$genres, $title, $studio];
                break;

            case !empty($title) && !empty($genres):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    WHERE Genre IN (:genres)
                    AND Film.Title LIKE :title";
                $execute = [$genres, $title];
                break;

            case !empty($genres) && !empty($studio):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    WHERE Genre IN (:genres)
                    AND Studio.Studio LIKE :studio'";
                $execute = [$genres, $studio];
                break;

            case !empty($title) && !empty($publicationYear):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    WHERE YEAR(Film.ReleaseDate) = :publicationYear
                    AND Film.Title LIKE :title";
                    exit();
                $execute = [$title, $publicationYear];
                break;

            case !empty($genres):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    WHERE Genre IN (:genres)";
                $execute = [$genres];
                break;

            case !empty($title):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    WHERE Film.Title LIKE :title";
                $execute = [$title];
                break;

            case !empty($studio):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    WHERE Studio.Studio LIKE :studio";
                $execute = [$studio];
                break;

            case !empty($publicationYear):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    WHERE YEAR(Film.ReleaseDate) = :publicationYear";
                $execute = [$publicationYear];
                break;

            case !empty($language):
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                    INNER JOIN Genre
                        ON Genre.GenreID = Film.GenreID
                    INNER JOIN Studio
                        ON Film.StudioID = Studio.StudioID
                    INNER JOIN Language
						ON Film.LanguageID = Language.LanguageID
                    WHERE  Language.Language = :language";
                $execute = [$language];
                break;
            default:
                $query = "SELECT Film.FilmID, Film.Img, Film.Title, Film.ReleaseDate, Genre.Genre, Studio.Studio FROM Film
                INNER JOIN Genre
                    ON Genre.GenreID = Film.GenreID
                INNER JOIN Studio
	                ON Film.StudioID = Studio.StudioID";
                $execute = [];
                break;
        }

        return [$query, $execute];
    }

    private function isFilterValueEmpty($value) {
        if(empty($value)) {
            $value = "$value";
        }else{
            $value = "%$value%";
        }

        return $value;
    }

    protected function get5TopRatedGenre($genre) {
        $genre = "$genre";
        $query = "SELECT TOP 5 Film.FilmID, Film.Title, Film.ReleaseDate, Film.Img, Genre.Genre, Studio.Studio FROM Film
                INNER JOIN Genre
                    ON Genre.GenreID = Film.GenreID
                INNER JOIN Studio
	                ON Film.StudioID = Studio.StudioID
                WHERE Genre.Genre = :genre
                AND Film.Review IS NOT NULL";

        $connection = $this->connect()->prepare($query);
        $connection->execute([$genre]);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getMovieDetail($id) {
        $query = "SELECT Film.FilmID, Film.Title, Film.ReleaseDate, Film.Img, Film.Background_Img, Film.Review, Genre.Genre, Studio.Studio, Film.RunTimeMinutes, Film.BudgetDollars, Film.OscarNominations, Film.OscarWins, Director.FullName AS 'Director Fullname', Director.Img AS 'Director IMG' FROM Film
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
                WHERE Film.FilmID = :id";

        $connection = $this->connect()->prepare($query);
        $connection->execute([$id]);

        if($connection->rowCount() == 0) {
            header("location: 404.php");
            exit();
        }

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getActors($id){
        $query = "SELECT Actor.FullName, Actor.FullName AS 'Actor Fullname', Role.Role, Actor.Img FROM Film
                INNER JOIN Role
                    ON Role.FilmID = Film.FilmID
                INNER JOIN Actor
                    ON Role.ActorID = Actor.ActorID
                WHERE Film.FilmID = :id";

        $connection = $this->connect()->prepare($query);
        $connection->execute([$id]);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getRecomendations($id, $genre) {
        $genre = "$genre";
        $query = "SELECT TOP 10 Film.FilmID, Film.Title, Film.Img FROM Film
                INNER JOIN Genre
                    ON Genre.GenreID = Film.GenreID
                WHERE Film.FilmID <> :id and Genre.Genre = :genre";

        $connection = $this->connect()->prepare($query);
        $connection->execute([$id, $genre]);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getAllGenres(){
        $query = "SELECT Genre FROM Genre ORDER BY Genre";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getAllYears(){
        $query = "SELECT DISTINCT YEAR(ReleaseDate) AS 'Year' FROM Film ORDER BY YEAR(ReleaseDate) DESC";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getAllLanguage(){
        $query = "SELECT [Language] FROM [Language] ORDER BY [Language]";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function getAllStudios(){
        $query = "SELECT DISTINCT Studio FROM Studio";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }

    protected function get3Reviews(){
        $query = "SELECT TOP 3 Title, Review FROM Film";

        $connection = $this->connect()->query($query);

        $results = $connection->fetchAll();

        return $results;
    }
}
