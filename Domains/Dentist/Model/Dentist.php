<?php 
    require_once(__DIR__."../../../Employee/Model/Employee.php");

    class Dentist extends Employee{
        private Specialization $specialization = array();

        public function __construct($fullName, $email, $password, $phoneNumber, $salary ,$fullAddress ,$CPF, Profile $profile){
            parent::__construct($fullName, $email, $password, $phoneNumber, $salary ,$fullAddress ,$CPF, $profile); // Chama o construtor da classe Pai
        }
    }
?>