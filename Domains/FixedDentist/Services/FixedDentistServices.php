<?php
    require_once(__DIR__ . '/../Model/FixedDentist.php');
    require_once(__DIR__."../../../../Functions/checkCpf.php");
    require_once(__DIR__."../../../../Functions/checkEmail.php");

    class FixedDentistServices{
        function createFixedDentist($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, Specialization $specialization, Profile $profile){
            try{
                checkEmail($email);
                checkCpf($CPF);

                $fixedDentist = new FixedDentist($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, $specialization, $profile);
                $fixedDentist->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function updateFixedDentist(FixedDentist $fixedDentist, $specialization){
            $fixedDentist->setSpecialization($specialization);
        }

        function deleteFixedDentist($CPF){
            try{
                $fixedDentist = $this->getFixedDentist($CPF);

                $fixedDentist->delete();
            }catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        function getFixedDentist($CPF){
            $fixedDentist = FixedDentist::getRecordsByField("CPF", $CPF);
            if(!$fixedDentist)
                throw new NotFoundError("Dentista não encontrado");

            return $fixedDentist[0];
        }

        function getAll(){
            $fixedDentists = FixedDentist::getRecords();
            if(!$fixedDentists)
                throw new NotFoundError("Nenhum dentista encontrado");

            return $fixedDentists;
        }
    }

    return new FixedDentistServices();
?>