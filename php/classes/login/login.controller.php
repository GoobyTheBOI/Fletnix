<?php

class loginController extends Login {

    private $email;
    private $password;


    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser() {
        if ($this->emptyInput() == false) {
            header("location: ../../login.php?error=emptyinput");
            exit();
        }

        if ($this->invalidEmail() == false) {
            header("location: ../../login.php?error=email");
            exit();
        }

        $this->getUser($this->email, $this->password);

    }

    private function emptyInput() {
        $result;

        if (empty($this->email) || empty($this->password)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

    private function invalidEmail() {
        $result;

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }
}
