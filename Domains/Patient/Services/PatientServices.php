<?php
    require(__DIR__ . '/../Model/Patient.php');

    class PatientServices{
        function createPatient($fullName, $email, $phoneNumber, $RG, $birthDate, $client){
            try{
                $patient = new Patient($fullName, $email, $phoneNumber, $RG, $birthDate, $client);
                $patient->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function updatePatient(Patient $patient, $fullName, $email, $phoneNumber, $client){
            $patient->setFullName($fullName);
            $patient->setEmail($email);
            $patient->setPhoneNumber($phoneNumber);

            $patient->setClient($client);
        }

        function deletePatient(){ //Implementar quando o banco de dados for criado

        }
    }

    return new PatientServices();
?>