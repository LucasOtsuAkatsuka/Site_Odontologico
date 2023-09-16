<?php 
    require("../Functions/ValidateCpf.php");

    class User{
        private $fullName;
        private $email;
        private $phoneNumber;


        public function __construct($fullName, $email, $phoneNumber, $RG, $CPF){
            $this->fullName = $fullName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;

        }

        public function getFullName(){return $this->fullName;}
        public function getEmail(){return $this->email;}
        public function getPhoneNumber(){return $this->phoneNumber;}


        public function setFullName($fullName){$this->fullName = $fullName;}
        public function setEmail($email){$this->email = $email;}
        public function setPhoneNumber($phoneNumber){$this->phoneNumber = $phoneNumber;}
    }

?>