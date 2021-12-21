<?php

class Dbh {
    private $host = "localhost";
    private $user = "SA";
    private $password = "p@ssw0rd";
    private $db_name = "Fletnix";

    protected function connect() {
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        $database = "sqlsrv:server=$this->host;Database=$this->db_name";
        $conn = new PDO($database, $this->user, $this->password, $options);

        return $conn;
    }
}
