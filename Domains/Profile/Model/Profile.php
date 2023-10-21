<?php

    require_once(__DIR__."../../../../Database/persist.php");

    class Profile extends persist{
        
        protected static $local_filename = "Profile.txt";
        private $profileType;
        private $permissions = array();

        public function __construct($profileType){
            $this->profileType = $profileType;
        }
        
        public function getProfileType(){return $this->profileType;}
        public function setProfileType($profileType){$this->profileType = $profileType;}
        
        public function getPermissions(){return $this->permissions;}
        public function addPermissions($permission){$this->permissions[] = $permission;}
        
        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

    }



?>