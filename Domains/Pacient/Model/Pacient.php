<?php
    class Pacient{
        private $fullName;
        private $email;
        private $phoneNumber;
        private $RG;
        private $birthDate;

        private $client;

        public function __construct($fullName, $email, $phoneNumber, $RG, $birthDate, $client){
            $this->fullName = $fullName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->RG = $RG;
            $this->birthDate = $birthDate;
            $this->client = $client;
        }

        public function getFullName(){return $this->fullName;}
        public function getEmail(){return $this->email;}
        public function getPhoneNumber(){return $this->phoneNumber;}
        public function getRG(){return $this->RG;}
        public function getBirthDate(){return $this->birthDate;}
        public function getClient(){return $this->client;}

        public function setFullName($fullName){$this->fullName = $fullName;}
        public function setEmail($email){$this->email = $email;}
        public function setPhoneNumber($phoneNumber){$this->phoneNumber = $phoneNumber;}
        public function setRG($RG){$this->RG = $RG;}
        public function setBirthDate($birthDate){$this->birthDate = $birthDate;}
        public function setClient($client){$this->client = $client;}
    }
?>