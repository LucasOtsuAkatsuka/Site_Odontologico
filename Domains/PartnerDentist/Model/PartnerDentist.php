<?php
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");

    class PartnerDentist extends Dentist {
        private $comission;

        public function __construct($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $comission) {
            parent::__construct($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF);
            $this->comission = $comission;            
        }

        public function getComission(){return $this->comission;}

        public function setComission($comission){$this->comission = $comission;}
        
    }
?>