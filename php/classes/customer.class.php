<?php
require_once("dbh.class.php");

class Customer extends Dbh {
    public function getCustomers() {
        $sql = "SELECT * FROM Customer";

        $connection = $this->connect()->query($sql);

        while ($row = $connection->fetchAll()) {
            return $row;
        }
    }
}
