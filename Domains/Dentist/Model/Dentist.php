<?php 
    require_once(__DIR__."../../../Employee/Model/Employee.php");
    require_once(__DIR__."../../../Specialization/Model/Specialization.php");

    class Dentist extends Employee{
        private $specializations = array();

        public function __construct($fullName, $email, $password, $phoneNumber, $salary ,$fullAddress ,$CPF, Profile $profile){
            parent::__construct($fullName, $email, $password, $phoneNumber, $salary ,$fullAddress ,$CPF, $profile); 
        }

        public function addSpecialization(Specialization $specialization){
            $this->specializations[] = $specialization;
        }

        public function getSpecializations(){return $this->specializations;}
    }
?>