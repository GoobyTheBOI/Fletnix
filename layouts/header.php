<?php session_start(); ?>
<header class="header">
    <div class="header header__container">
        <div class="header__flex header__flex--align-center">
            <a href="./index.php">
                <img class="header header__logo" src="./images/logo.png" alt="logo">
            </a>
            <h1 class="header header__title header header__title--margin">FLETNIX</h1>

            <label for="hamburger">&#9776;</label>
        </div>

        <nav class="nav nav--options">
            <input type="checkbox" id="hamburger" />
            <ul class="menu">
                <li class="menu__items">
                    <a class="menu__items--home" href="./index.php">
                        Home
                    </a>
                </li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="menu__items">
                        <div
                            class="header header__button header header__button--vivid-sky-blue">
                            <?= $_SESSION['username']; ?>
                        </div>
                    </li>
                    <li class="menu__items">
                        <a href="php/includes/logout.inc.php">
                            <div
                                class="header header__button header header__button--vivid-sky-blue">
                                Logout</div>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="menu__items">
                        <a href="./login.php">
                            <div
                                class="header header__button header header__button--vivid-sky-blue">
                                Login
                            </div>
                        </a>
                    </li>
                    <li class="menu__items">
                        <a href="./register.php">
                            <div class="header header__button header header__button--vivid-sky-blue">
                                Registreer
                            </div>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
