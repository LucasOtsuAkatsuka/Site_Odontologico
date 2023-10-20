<?php
    require_once(__DIR__."../../../../Errors/NotFoundError.php");
    require_once(__DIR__ . '/../Model/Client.php');
    require_once(__DIR__."../../../../Functions/checkCpf.php");

    class ClientServices{
        function createClient($fullName, $email, $phoneNumber, $RG, $CPF){
            try{
                checkCpf($CPF);
                checkRG($RG);

                $client = new Client($fullName, $email, $phoneNumber, $RG, $CPF);
                $client->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function updateClient(Client $client, $fullName, $email, $phoneNumber){

        }

        function deleteClient($CPF){
            try{
                $client = $this->getClient($CPF);

                $client->delete();
            }catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        function getClient($CPF){
            $client = Client::getRecordsByField("CPF", $CPF);
            if(!$client)
                throw new NotFoundError("Cliente não encontrado");

            return $client[0];
        }

        function getAll(){
            $clients = Client::getRecords();
            if(!$clients)
                throw new NotFoundError("Nenhum cliente encontrado");

            return $clients;
        }
    }

    return new ClientServices();
?>
