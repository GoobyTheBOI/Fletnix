<?php

class signUpController extends SignUp {

    private $username;
    private $firstname;
    private $lastname;
    private $email;
    private $birth_date;
    private $country;
    private $subscription;
    private $accountnmbr;
    private $password;
    private $password_repeat;
    private $gender;

    public function __construct($username, $firstname, $lastname, $email, $birth_date, $country, $subscription, $accountnmbr, $password, $password_repeat, $gender) {
        $this->username = $username;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->birth_date = $birth_date;
        $this->country = $country;
        $this->subscription = $subscription;
        $this->accountnmbr = $accountnmbr;
        $this->password = $password;
        $this->password_repeat = $password_repeat;
        $this->gender = $gender;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../../register.php?error=emptyinput");
            exit();
        }

        if ($this->invalidEmail() == false) {
            header("location: ../../register.php?error=email");
            exit();
        }

        if($this->passwordLength() == false) {
            header("location: ../../register.php?error=passwordlength");
            exit();
        }

        if ($this->passwordMatch() == false) {
            header("location: ../../register.php?error=passwordmatch");
            exit();
        }

        if ($this->userExist() == false) {
            header("location: ../../register.php?error=userexist");
            exit();
        }

        $_SESSION['subscription'] = null;

        $this->setUser($this->username, $this->firstname, $this->lastname, $this->email, $this->birth_date, $this->country, $this->subscription, $this->accountnmbr, $this->password, $this->gender);

    }

    private function emptyInput() {
        $result;

        if (empty($this->username) || empty($this->firstname) || empty($this->lastname) || empty($this->email) || empty($this->birth_date) || empty($this->country) || empty($this->subscription) || empty($this->accountnmbr) || empty($this->password) || empty($this->password_repeat) || empty($this->gender)) {
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

    private function passwordLength() {
        $result;

        if (strlen($this->password) < 6) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

    private function passwordMatch() {
        $result;

        if ($this->password !== $this->password_repeat) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }

    private function userExist() {
        $result;

        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        }else {
            $result = true;
        }

        return $result;
    }
}
