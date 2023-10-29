<?php
    require_once(__DIR__."../../../../Database/persist.php");
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Patient/Model/Patient.php");

    class Appointment extends persist{
        private Patient $patient;
        private FixedDentist $appointmentDentist;
        private $appoitmentDate;
        private $appoitmentTime;
        private $expectedDuration;

        protected static $local_filename = "Appointment.txt";

        public function __construct(Patient $patient, Dentist $appointmentDentist, $appoitmentDate, $appoitmentTime, $expectedDuration){
            $this->patient = $patient;
            $this->appointmentDentist = $appointmentDentist;
            $this->appoitmentDate = $appoitmentDate;
            $this->appoitmentTime = $appoitmentTime;
            $this->expectedDuration = $expectedDuration;
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getPatient():Patient{return $this->patient;}
        public function getAppointmentDentist():FixedDentist{return $this->appointmentDentist;}
        public function getAppointmentDate(){return $this->appoitmentDate;}
        public function getAppointmentTime(){return $this->appoitmentTime;}
        public function getExpectedDuration(){return $this->expectedDuration;}
        
        public function setPatient(Patient $patient){$this->patient = $patient;}
        public function setAppointmentDentist(FixedDentist $appointmentDentist){$this->appointmentDentist = $appointmentDentist;}
        public function setAppointmentDate($appoitmentDate){$this->appoitmentDate = $appoitmentDate;}
        public function setAppointmentTime($appoitmentTime){$this->appoitmentTime = $appoitmentTime;}
        public function setExpectedDuration($expectedDuration){$this->expectedDuration = $expectedDuration;}
        
    }

?>
