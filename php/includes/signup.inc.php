<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $birth_date = $_POST['bdate'];
    $country = $_POST['country'];
    $subscription = $_POST['subscription'];
    $accountnmbr = $_POST['accountnmbr'];
    $password = $_POST['password'];
    $password_repeat = $_POST['re-password'];
    $gender = "Male";

    require("../classes/dbh.class.php");
    require("../classes/signup/signup.class.php");
    require("../classes/signup/signup.controller.php");

    $signup = new signUpController($username, $firstname, $lastname, $email, $birth_date, $country, $subscription, $accountnmbr, $password, $password_repeat, $gender);

    $signup->signupUser();

    header("location: ../../login.php?error=none");
}
