<?php
    require(__DIR__."../../../../Functions/ValidateCpf.php");
    require_once(__DIR__."../../../User/Model/User.php");

    class Employee extends User
    {
        private $salary;
        private $fullAddress;
        private $CPF;

        public function __construct($fullName, $email, $phoneNumber, $salary ,$fullAddress ,$CPF) 
      {
          parent::__construct($fullName, $email, $phoneNumber); // Chama o construtor da classe Pai
          $this->salary = $salary;
          $this->fullAddress = $fullAddress;
          validateCPF($CPF);
          $this->CPF = $CPF;
      }
      
        public function getSalary(){return $this->salary;}
        public function getAddress(){return $this->fullAddress;}
        public function getCPF(){return $this->CPF;}

        public function setSalary($salary){$this->salary = $salary;}
        public function setAddress($fullAddress){$this->fullAddress = $fullAddress;}
        public function setCPF($CPF){$this->CPF = $CPF;}
      
    } 
?>
