<?php
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");

    class FixedDentist extends Dentist {
        private $CRO;
        private $specialization;

        public function __construct($fullName, $email, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, $specialization){
            parent::__construct($fullName, $email, $phoneNumber, $salary, $fullAddress, $CPF);
            $this->CRO = $CRO;
            $this->specialization = $specialization;
        }

        public function getCRO(){return $this->CRO;}
        public function getSpecialization(){return $this->specialization;}

        public function setCRO($CRO){$this->CRO = $CRO;}
        public function setSpecialization($specialization){$this->specialization = $specialization;}

    }

?>