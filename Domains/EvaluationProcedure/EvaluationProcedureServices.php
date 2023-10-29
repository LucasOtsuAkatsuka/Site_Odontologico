<?php

    require_once(__DIR__."../../../../Database/persist.php");
    require_once(__DIR__."../../../Dentist/Model/Dentist.php");
    require_once(__DIR__."../../../Patient/Model/Patient.php");
    require_once(__DIR__."../../../Patient/Model/Appointment.php");

    class EvaluationProcedure extends Appointment
    {

        public static function create(Patient $patient, Dentist $appointmentDentist, $appoitmentDate, $appoitmentTime, $expectedDuration)
        {  
            try{
                $appointment = new Appointment($patient, $appointmentDentist, $appoitmentDate, $appoitmentTime, 30);
                $appointment->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        public function update()
        {
        }

        public function delete()
        {
        }
    }






