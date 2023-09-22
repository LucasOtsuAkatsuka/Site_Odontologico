<?php
    require("../Model/Pacient.php");

    class PacientServices{
        function createPacient($fullName, $email, $phoneNumber, $RG, $birthDate, $client){
            $pacient = new Pacient($fullName, $email, $phoneNumber, $RG, $birthDate, $client);

            return $pacient;
        }

        function updatePacient(Pacient $pacient, $fullName, $email, $phoneNumber, $client){
            $pacient->setFullName($fullName);
            $pacient->setEmail($email);
            $pacient->setPhoneNumber($phoneNumber);

            $pacient->setClient($client);
        }

        function deletePacient(){ //Implementar quando o banco de dados for criado

        }
    }
?>