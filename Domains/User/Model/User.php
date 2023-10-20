<?php 
    require_once(__DIR__."../../../../Database/persist.php");

    class User extends persist{
        private $fullName;
        protected $email;
        protected $password;
        private $phoneNumber;

        protected static $local_filename = "User.txt";

        public function __construct($fullName, $email, $password, $phoneNumber){
            $this->fullName = $fullName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            $this->password = $password;
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getFullName(){return $this->fullName;}
        public function getEmail(){return $this->email;}
        public function getPhoneNumber(){return $this->phoneNumber;}
        public function getPassword(){return $this->password;}

        public function setFullName($fullName){$this->fullName = $fullName;}
        public function setEmail($email){$this->email = $email;}
        public function setPhoneNumber($phoneNumber){$this->phoneNumber = $phoneNumber;}
        public function setPassword($password){$this->password = $password;}
    }

?>