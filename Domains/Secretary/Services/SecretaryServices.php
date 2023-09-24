<?php
    require(__DIR__."../../../Secretary/Model/Secretary.php");

    class SecretaryServices{
        function createSecretary($fullName, $email, $phoneNumber, $salary, $fullAddress, $CPF){
            $secretary = new Secretary($fullName, $email, $phoneNumber, $salary, $fullAddress, $CPF);

            return $secretary;
        }

        function updateSecretary(Patient $patient, $fullName, $email, $phoneNumber, $client){
            
        }

        function deleteSecretary(){ //Implementar quando o banco de dados for criado

        }
    }

    return new SecretaryServices();
?>