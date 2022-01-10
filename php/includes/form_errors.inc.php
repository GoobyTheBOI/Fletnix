<?php

function drawError() {

    $error = null;

    $errorResult = isset($_GET['error']) ? $_GET['error'] : false;


    if($errorResult == 'userexist'):
        $error = 'User already exist';
    elseif($errorResult == 'emptyinput'):
        $error = "Field can't be empty";
    elseif($errorResult == 'email' || $errorResult == "wrongpassword"):
        $error = "Email or Password is wrong";
    elseif($errorResult == 'passwordmatch'):
        $error = "Passwords are not the same";
    elseif($errorResult == 'passwordlength'):
        $error = "Passwords must be longer then 5 letters";
    endif;

    return $error;
}
