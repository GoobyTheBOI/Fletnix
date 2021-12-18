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

    <main class="main main--overons">
        <section class="informatie">
            <h2>Over ons</h2>
            <img class="informatie__image" src="./images/logo.png" alt="logo">
            <p class="informatie__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis impedit
                facere voluptates nobis mollitia dolore. Minima harum ea quos obcaecati eos
                fugit, autem ad maxime animi dolor voluptates at optio.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil a ipsam maxime. Pariatur quos ipsum ea rem, non ratione commodi! Maxime ipsam consequatur voluptatibus ad, accusamus nostrum cupiditate dolor atque!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit obcaecati quod beatae ut ipsa esse aut nobis cupiditate, quo nulla soluta, non at amet delectus vel praesentium aliquid voluptatem. Animi?
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima, ipsa autem nisi impedit dolore obcaecati culpa. Alias nobis odit, adipisci fugiat natus officia placeat, impedit illum, et corrupti ad excepturi?
            </p>

            <div class="informatie__vragen">
                Do you have Questions?

                <div class="informatie__vragen--telefoon">
                    Call: 06-123456789 or Email us at: fletnix@gmail.com
                </div>
            </div>
        </section>
    </main>
    <?= require_once("./layouts/footer.php"); ?>
</body>

</html>
