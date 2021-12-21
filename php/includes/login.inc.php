<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require("../classes/dbh.class.php");
    require("../classes/login/login.class.php");
    require("../classes/login/login.controller.php");

    $signup = new loginController($email, $password);

    $signup->loginUser();

    header("location: ../../index.php");
}
