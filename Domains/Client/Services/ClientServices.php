<?php
    require(__DIR__ . '/../Model/Client.php');

    class ClientServices{
        function createClient($fullName, $email, $phoneNumber, $RG, $CPF)
        {
            try{
                $client = new Client($fullName, $email, $phoneNumber, $RG, $CPF);
                $client->save();
                echo "client criado com sucesso";
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
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
