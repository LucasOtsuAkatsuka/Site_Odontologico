<?php
    require_once(__DIR__."../../Model/Appointment.php");
    require_once(__DIR__."../../../../Errors/NotFoundError.php");

    class AppointmentServices{
        function createAppointment(Patient $patient, FixedDentist $appointmentDentist, $appoitmentDate, $appoitmentTime, $expectedDuration)
        {
            try{
                $appointment = new Appointment($patient, $appointmentDentist, $appoitmentDate, $appoitmentTime, $expectedDuration);
                $appointment->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function updateAppointment(Appointment $Appointment, $fullName, $email, $phoneNumber){
            
        }

        function deleteAppointment($index){
            try{
                $appointment = $this->getAppointment($index);

                $appointment->delete();
            }catch (Exception $e){
                throw new NotFoundError($e->getMessage());
            }
        }
        
        function getAppointment($index){
            $Appointment = Appointment::getRecordsByField("index", $index);
            if(!$Appointment)
                throw new NotFoundError("Consulta não encontrada");

            return $Appointment[0];
        }

        function getAll(){
            $appointments = Appointment::getRecords();
            if(!$appointments)
                throw new NotFoundError("Nenhuma consulta encontrada");

            return $appointments;
        }
    }

    return new AppointmentServices();
?>