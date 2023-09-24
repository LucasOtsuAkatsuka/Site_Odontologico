<?php


    class Procedure
    {
        private $type;
        private $description;
        private $value;

        public function __construct($type, $description, $value) 
      {
          $this->type = $type;
          $this->description = $description;
          $this->value = $value;
      }
      
        public function getType(){return $this->type;}
        public function getDescription(){return $this->description;}
        public function getValue(){return $this->value;}

        public function setType($type){$this->type = $type;}
        public function setDescription($description){$this->description = $description;}
        public function setId($value){$this->value = $value;}
      
    }

?>