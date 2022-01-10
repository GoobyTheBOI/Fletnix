<?php
class SignUp extends Dbh {

    protected function setUser($username, $firstname, $lastname, $email, $birth_date, $country, $subscription, $accountnmbr, $password, $gender) {
        $connection = $this->connect()->prepare("INSERT INTO Users VALUES(:username, :firstname, :lastname, :email, :birth_date, :country, :gender, :subscription, :accountnmbr, :password);");

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $connection->execute([$username, $firstname, $lastname, $email, $birth_date, $country, $gender, $subscription, $accountnmbr, $hash_password]);

        if (!$connection->execute([$username, $firstname, $lastname, $email, $birth_date, $country, $gender, $subscription, $accountnmbr, $hash_password])) {
            $connection = null;
            header("location: ../../../register.php?error=connectionfailed");
            exit();
        }

        $connection = null;
    }

    protected function checkUser($username, $email) {
        $connection = $this->connect()->prepare("SELECT COUNT(*) FROM Users WHERE username = :username OR email = :email;");
        $connection->execute([$username, $email]);

        if (!$connection->execute([$username, $email])) {
            $connection = null;
            header("location: ../../../register.php?error=userexist");
            exit();
        }

        $connectionResult;
        if ($connection->fetchColumn() > 0) {
            $connectionResult = false;
        }else{
            $connectionResult = true;
        }

        return $connectionResult;
    }
}
