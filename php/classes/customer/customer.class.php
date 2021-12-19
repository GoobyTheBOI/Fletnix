<?php
require_once("../dbh.class.php");

class Customer extends Dbh {
    public function getCustomers() {
        $sql = "SELECT * FROM Customer";

        $connection = $this->connect()->query($sql);

        while ($row = $connection->fetchAll()) {
            return $row;
        }
    }

    protected function getCustomer($firstname) {
        $sql = "SELECT * FROM Customer WHERE firstname = :firstname";

        $connection = $this->connect()->prepare($sql);
        $connection->execute([$firstname]);

        $result = $connection->fetchAll();

        return $result;
    }

    public function setCustomer($firstname) {
        // $sql = "INSERT INTO Customer(customer_mail_adress, lastname, firstname, payment_method, contract_type, subscription_start, subscription_end, user_name, password, country_name, gender, birth_date)
        //         VALUES ()";
    }
}
