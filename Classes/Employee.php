<?php
    require("../Functions/ValidateCpf.php");

    class Employee{
        private $fullName;
        private $email;
        private $phoneNumber;
        private $fullAddress;
        private $CPF;

        public function __construct($fullName, $email, $phoneNumber, $fullAddress, $CPF){
            $this->fullName = $fullName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->fullAddress = $fullAddress;

            validateCPF($CPF);
            $this->CPF = $CPF;
        }

        public function getFullName(){return $this->fullName;}
        public function getEmail(){return $this->email;}
        public function getPhoneNumber(){return $this->phoneNumber;}
        public function getFullAddress(){return $this->fullAddress;}
        public function getCPF(){return $this->CPF;}

        public function setFullName($fullName){$this->fullName = $fullName;}
        public function setEmail($email){$this->email = $email;}
        public function setPhoneNumber($phoneNumber){$this->phoneNumber = $phoneNumber;}
        public function setFullAddress($fullAddress){$this->fullAddress = $fullAddress;}
    }
?>
