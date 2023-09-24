<?php
    require(__DIR__ . '/../Model/Client.php');

    class ClientServices{
        function createClient($fullName, $email, $phoneNumber, $RG, $CPF)
        {
            $client = new Client($fullName, $email, $phoneNumber, $RG, $CPF);

            return $client;
        }

        function updateClient(Client $client, $fullName, $email, $phoneNumber){
            $client->setFullName($fullName);
            $client->setEmail($email);
            $client->setPhoneNumber($phoneNumber);
        }

        function deleteClient(){ //Implementar quando o banco de dados for criado

        }
    }

    return new ClientServices();
?>
