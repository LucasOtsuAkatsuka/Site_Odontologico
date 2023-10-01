<?php
    require_once(__DIR__."../../../../Database/persist.php");
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Patient/Model/Patient.php");

    class Appointment extends persist{
        private $patient;
        private $appointmentDentist;
        private $appoitmentDate;
        private $appoitmentTime;
        private $expectedDuration;

        protected static $local_filename = "Appointment.txt";

        public function __construct( $patient, $appointmentDentist, $appoitmentDate, $appoitmentTime, $expectedDuration){
            $this->patient = $patient;
            $this->appointmentDentist = $appointmentDentist;
            $this->appoitmentDate = $appoitmentDate;
            $this->appoitmentTime = $appoitmentTime;
            $this->expectedDuration = $expectedDuration;
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getPatient(){return $this->patient;}
        public function getAppointmentDentist(){return $this->appointmentDentist;}
        public function getAppointmentDate(){return $this->appoitmentDate;}
        public function getAppointmentTime(){return $this->appoitmentTime;}
        public function getExpectedDuration(){return $this->expectedDuration;}
        
        public function setPatient($patient){$this->patient = $patient;}
        public function setAppointmentDentist($appointmentDentist){$this->appointmentDentist = $appointmentDentist;}
        public function setAppointmentDate($appoitmentDate){$this->appoitmentDate = $appoitmentDate;}
        public function setAppointmentTime($appoitmentTime){$this->appoitmentTime = $appoitmentTime;}
        public function setExpectedDuration($expectedDuration){$this->expectedDuration = $expectedDuration;}
        
    }

?>