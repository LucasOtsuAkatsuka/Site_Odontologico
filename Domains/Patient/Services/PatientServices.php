<?php
    require(__DIR__ . '/../Model/Patient.php');

    class PatientServices{
        function createPacient($fullName, $email, $phoneNumber, $RG, $birthDate, $client){
            $patient = new Patient($fullName, $email, $phoneNumber, $RG, $birthDate, $client);

            return $patient;
        }

        function updatePacient(Patient $patient, $fullName, $email, $phoneNumber, $client){
            $patient->setFullName($fullName);
            $patient->setEmail($email);
            $patient->setPhoneNumber($phoneNumber);

            $patient->setClient($client);
        }

        function deletePacient(){ //Implementar quando o banco de dados for criado

        }
    }

    return new PatientServices();
?>