<?php

require("../Functions/ValidateCpf.php");
require_once('Employee.php');

class Auxiliary extends Employee
{

    public function __construct($fullName, $email, $phoneNumber, $salary, $fullAddress, $CPF)
    {
        parent::__construct($fullName, $email, $phoneNumber, $salary, $fullAddress, $CPF);
    }

}

?>