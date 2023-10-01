<?php
  require(__DIR__."../../../../Database/persist.php");
  require_once(__DIR__."../../../Appointment/Model/Appointment.php");
  require_once(__DIR__."../../../Errors/InvalidParamsError.php");

    class Procedure extends persist{
        private $type;
        private $description;
        private $value;
        private $appointments = array();

        protected static $local_filename = "Procedure.txt";

        public function __construct($type, $description, $value){
          $this->type = $type;
          $this->description = $description;
          $this->value = $value;
        }

        static public function getFilename(){
          return get_called_class()::$local_filename;
      }
      
        public function getType(){return $this->type;}
        public function getDescription(){return $this->description;}
        public function getValue(){return $this->value;}

        public function setType($type){$this->type = $type;}
        public function setDescription($description){$this->description = $description;}
        public function setValue($value){$this->value = $value;}
        
        public function addAppointments($appointment){
          if($appointment instanceof Appointment){
            $this->appointments[] = $appointment; 
          } else {
            throw new InvalidParamsError("Invalid appointment");
          }
        }
      }
?>