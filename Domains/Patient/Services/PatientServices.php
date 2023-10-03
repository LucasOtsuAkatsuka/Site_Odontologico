<?php
    require(__DIR__ . '/../Model/Patient.php');
    require(__DIR__."../../../../Errors/NotFoundError.php");

    class PatientServices{
        function createPatient($fullName, $email, $phoneNumber, $RG, $birthDate,  $client){
            try{
                $patient = new Patient($fullName, $email, $phoneNumber, $RG, $birthDate, $client);
                $patient->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function updatePatient(Patient $patient, $fullName, $email, $phoneNumber){
            
        }

        function deletePatient($RG){ //Implementar quando o banco de dados for criado
            try{
                $patient = $this->getPatient($RG);

                $patient->delete();
            }catch (Exception $e){
                throw new NotFoundError($e->getMessage());
            }
        }
        
        function getPatient($RG){
            $patient = Patient::getRecordsByField("RG", $RG);
            if(!$patient)
                throw new NotFoundError("Paciente não encontrado");

            return $patient[0];
        }
    }

    return new PatientServices();
?>