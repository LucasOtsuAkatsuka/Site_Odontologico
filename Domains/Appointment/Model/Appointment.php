<?php
    require_once(__DIR__."../../../../Database/persist.php");
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Patient/Model/Patient.php");

    class Appointment extends persist{
        private Patient $patient;
        private Dentist $appointmentDentist;
        private $appointmentDate;
        private $appointmentTime;
        private $expectedDuration;

        protected static $local_filename = "Appointment.txt";

        public function __construct(Patient $patient, Dentist $appointmentDentist, $appointmentDate, $appointmentTime, $expectedDuration){
            $this->patient = $patient;
            $this->appointmentDentist = $appointmentDentist;
            $this->appointmentDate = $appointmentDate;
            $this->appointmentTime = $appointmentTime;
            $this->expectedDuration = $expectedDuration;
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getPatient():Patient{return $this->patient;}
        public function getAppointmentDentist():Dentist{return $this->appointmentDentist;}
        public function getAppointmentDate(){return $this->appointmentDate;}
        public function getAppointmentTime(){return $this->appointmentTime;}
        public function getExpectedDuration(){return $this->expectedDuration;}
        
        public function setPatient(Patient $patient){$this->patient = $patient;}
        public function setAppointmentDentist(Dentist $appointmentDentist){$this->appointmentDentist = $appointmentDentist;}
        public function setAppointmentDate($appoitmentDate){$this->appointmentDate = $appoitmentDate;}
        public function setAppointmentTime($appoitmentTime){$this->appointmentTime = $appoitmentTime;}
        public function setExpectedDuration($expectedDuration){$this->expectedDuration = $expectedDuration;}
        
    }

?>
