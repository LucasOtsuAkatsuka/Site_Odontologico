<?php
    require_once(__DIR__."../../../Secretary/Model/Secretary.php");
    require_once(__DIR__."../../../../Errors/NotFoundError.php");
    require_once(__DIR__."../../../../Functions/checkCpf.php");

    class SecretaryServices{
        function createSecretary($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF){
            try{
                checkCpf($CPF);

                $secretary = new Secretary($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF);
                $secretary->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function deleteSecretary($CPF){
            try{
                $secretary = $this->getSecretary($CPF);

                $secretary->delete();
            }catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        function getSecretary($CPF){
            $secretary = Secretary::getRecordsByField("CPF", $CPF);
            if(!$secretary)
                throw new NotFoundError("Secretária não encontrada");

            return $secretary[0];
        }

        function getAll(){
            $secretaries = Secretary::getRecords();
            if(!$secretaries)
                throw new NotFoundError("Nenhuma secretária encontrada");

            return $secretaries;
        }
    }

    return new SecretaryServices();
?>