<?php

    require_once(__DIR__."../../../../Database/persist.php");
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Patient/Model/Patient.php");
    require_once(__DIR__."../../../Patient/Model/Appointment.php");

    Class EvaluationProcedure extends Appointment{
        
        
        public function __construct(Patient $patient, Dentist $appointmentDentist, $appoitmentDate, $appoitmentTime, $expectedDuration)
        {
            parent::__construct($patient, $appointmentDentist, $appoitmentDate, $appoitmentTime, $expectedDuration);
        }

    }