<?php
class Login extends Dbh {

    protected function getUser($email, $password) {
        $connection = $this->connect()->prepare("SELECT password FROM Users WHERE email = :email");

        if (!$connection->execute([$email])) {
            $connection = null;
            header("location: ../../login.php?error=connectionfailed");
            exit();
        }

        if ($connection->rowCount() == 0) {
            $connection = null;
            header("location: ../../login.php?error=userexist");
            exit();
        }

        $passwordHashed = $connection->fetchAll();
        $checkPassword = password_verify($password, $passwordHashed[0]["password"]);

        if ($checkPassword == false) {
            $connection = null;
            header("location: ../../login.php?error=wrongpassword");
            exit();
        }else if($checkPassword == true) {
            $connection = $this->connect()->prepare("SELECT [user_id], username, email FROM Users WHERE email = :email AND [password] = :password");

            if (!$connection->execute([$email, $passwordHashed[0]["password"]])) {
                $connection = null;
                header("location: ../../login.php?error=connectionfailed");
                exit();
            }

            $user = $connection->fetchAll();
            session_start();
            $_SESSION['user_id'] = $user[0]['user_id'];
            $_SESSION['username'] = $user[0]['username'];
        }

        $connection = null;
    }
}
