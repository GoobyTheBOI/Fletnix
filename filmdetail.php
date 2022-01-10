<?php
    require_once("php\classes\movies\movie.view.php");
    include_once('php\includes\session_start.inc.php');

    $movie = new MovieView();

    if(!isset($_SESSION['user_id'])){
        header("location: ./login.php");
    }

    if (!empty($_GET['id']) && $_GET['id'] > 0 && $_GET['id'] < 2147483647) {
        $id = (int)$_GET['id'];
    }else{
        header("location: ./404.php");
    }
?>

<?php require_once("./layouts/head.php"); ?>

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
