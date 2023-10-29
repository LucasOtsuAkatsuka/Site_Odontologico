<?php
    require_once(__DIR__."../../../Patient/Model/Appointment.php");

    class EvaluationAppointmentServices{
        function createEvaluationAppointment(Patient $patient, Dentist $appointmentDentist, $appointmentDate, $appointmentTime){
            try{
                $appointment = new Appointment($patient, $appointmentDentist, $appointmentDate, $appointmentTime, 30);
                $appointment->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function updateAppointment(Appointment $Appointment, $fullName, $email, $phoneNumber){
            
        }

        function deleteEvaluationAppointment($index){
            try{
                $appointment = $this->getEvaluationAppointment($index);

                $appointment->delete();
            }catch (Exception $e){
                throw new NotFoundError($e->getMessage());
            }
        }
        
        function getEvaluationAppointment($index){
            $Appointment = Appointment::getRecordsByField("index", $index);
            if(!$Appointment)
                throw new NotFoundError("Consulta de avaliação não encontrada");

            return $Appointment[0];
        }

        function getAll(){
            $appointments = Appointment::getRecords();
            if(!$appointments)
                throw new NotFoundError("Nenhuma consulta de avaliação encontrada");

            return $appointments;
        }
    }






