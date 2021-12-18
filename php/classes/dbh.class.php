<?php

class Dbh {
    private $host = "localhost";
    private $user = "SA";
    private $password = "p@ssw0rd";
    private $db_name = "FLETNIX_DOCENT";

    protected function connect() {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $database = "sqlsrv:server=$this->host;Database=$this->db_name";
        $conn = new PDO($database, $this->user, $this->password, $options);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}
