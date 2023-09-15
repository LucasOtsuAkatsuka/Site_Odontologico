<?php
    class Client{
        private $fullName;
        private $email;
        private $phoneNumber;
        private $RG;
        private $CPF;

        public function __construct($fullName, $email, $phoneNumber, $RG, $CPF){
            $this->fullName = $fullName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->RG = $RG;

            validateCPF($CPF);
            $this->CPF = $CPF;
        }

        public function getFullName(){return $this->fullName;}
        public function getEmail(){return $this->email;}
        public function getPhoneNumber(){return $this->phoneNumber;}
        public function getRG(){return $this->RG;}
        public function getCPF(){return $this->CPF;}

        public function setFullName($fullName){$this->fullName = $fullName;}
        public function setEmail($email){$this->email = $email;}
        public function setPhoneNumber($phoneNumber){$this->phoneNumber = $phoneNumber;}
    }
?>