<?php
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Specialization/Model/Specialization.php");

    class FixedDentist extends Dentist {
        private $CRO;
        private Specialization $specialization;

        public function __construct($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, Specialization $specialization, Profile $profile){
            parent::__construct($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF, $profile);
            $this->CRO = $CRO;
            $this->specialization = $specialization;
        }

        public function getCRO(){return $this->CRO;}
        public function getSpecialization(){return $this->specialization;}

        public function setCRO($CRO){$this->CRO = $CRO;}
        public function setSpecialization(Specialization $specialization){$this->specialization = $specialization;}

    }

?>