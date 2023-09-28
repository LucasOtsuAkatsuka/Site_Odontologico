<?php
    class Specialization{
        private $specializationDescription;

        public function __construct($specializationDescription){
            $this->specializationDescription = $specializationDescription;
        }

        public function getDescription(){return $this->specializationDescription;}

        public function setDescription($specializationDescription){$this->specializationDescription = $specializationDescription;}
    }
?>