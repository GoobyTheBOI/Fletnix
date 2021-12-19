<?php
require("customer.class.php");

class CustomerView extends Customer {

    public function showCustomer($name) {
        $result = $this->getCustomer($name);

        print_r($result[0]['firstname']);
    }
}
