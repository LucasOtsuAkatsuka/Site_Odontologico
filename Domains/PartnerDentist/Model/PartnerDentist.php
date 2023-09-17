<?php
    require("../Functions/ValidateCpf.php");

    class PartnerDentist {
        private $fullName;
        private $email;
        private $phoneNumber;
        private $CPF;
        private $fullAddress;
        private $comission;

        public function __construct($fullName, $email, $phoneNumber, $CPF, $fullAddress, $comission) {
            $this->fullName = $fullName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            validateCPF($CPF);
            $this->CPF = $CPF;
            $this->fullAddress = $fullAddress;
            $this->comission = $comission;            
        }

        public function getFullName(){return $this->fullName;}
        public function getEmail(){return $this->email;}
        public function getPhoneNumber(){return $this->phoneNumber;}
        public function getCPF(){return $this->CPF;}
        public function getAddress(){return $this->fullAddress;}
        public function getComission(){return $this->comission;}

        public function setFullName($fullName){$this->fullName = $fullName;}
        public function setEmail($email){$this->email = $email;}
        public function setPhoneNumber($phoneNumber){$this->phoneNumber = $phoneNumber;}
        public function setCPF($CPF){$this->CPF = $CPF;}
        public function setAddress($fullAddress){$this->fullAddress = $fullAddress;}
        public function setComission($comission){$this->comission = $comission;}
        
    }
?>