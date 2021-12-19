<?php
class SignUp extends Dbh {

    protected function setUser($username, $firstname, $lastname, $email, $birth_date, $country, $subscription, $accountnmbr, $password, $gender) {
        $connection = $this->connect()->prepare("INSERT INTO Users VALUES(:username, :firstname, :lastname, :email, :birth_date, :country, :gender, :subscription, :accountnmbr, :password);");

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        if (!$connection->execute([$username, $firstname, $lastname, $email, $birth_date, $country, $gender, $subscription, $accountnmbr, $hash_password])) {
            $connection = null;
            header("location: ../../../register.php?error=connectionfailed");
            exit();
        }

        $connection = null;
    }

    protected function checkUser($username, $email) {
        $connection = $this->connect()->prepare("SELECT user_id FROM Users WHERE username = :username OR email = :email;");

        if (!$connection->execute([$username, $email])) {
            $connection = null;
            header("location: ../../../register.php?error=userexist");
            exit();
        }

        $connectionResult;
        if ($connection->rowCount() > 0) {
            $connectionResult = false;
        }else{
            $connectionResult = true;
        }

        return $connectionResult;
    }
}
