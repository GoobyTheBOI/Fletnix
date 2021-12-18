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

        <main class="main main--form">
            <div class="form__container">
                <h1 class="form__title">Login</h1>
                <form action="#" method="post" class="form">
                    <label class="form__label" for="email">Email</label>
                    <input class="form__input" type="email" name="email" id="email">
                    <label class="form__label" for="password">Password</label>
                    <input class="form__input" type="password" name="password" id="password">
                    <input class="form__input form__input--submit" type="submit" name="submit" id="submit">
                </form>

                <div class="form__link">
                    Not registered? <span class="form__link--blue"><a href="./register.php"> Create an account</a></span>
                </div>
            </div>
        </main>
        <?= require_once("./layouts/footer.php"); ?>
    </body>

</html>
