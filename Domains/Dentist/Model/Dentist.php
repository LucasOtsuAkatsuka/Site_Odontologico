<?php 
    require_once(__DIR__."../../../Employee/Model/Employee.php");


    class Dentist extends Employee{
        public function __construct($fullName, $email, $phoneNumber, $salary ,$fullAddress ,$CPF){
            parent::__construct($fullName, $email, $phoneNumber, $salary ,$fullAddress ,$CPF); // Chama o construtor da classe Pai
        }
    }
?>