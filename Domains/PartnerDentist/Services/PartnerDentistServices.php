<?php
    require(__DIR__ . '/../Model/ParnerDentist.php');
    require_once(__DIR__."../../../../Functions/checkCpf.php");

    class PartnerDentistServices{
        function createPartnerDentist($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $comission){
            try{
                checkCpf($CPF);

                $partnerDentist = new PartnerDentist($fullName, $email, $password, $phoneNumber, $CPF, $fullAddress, $salary, $comission);
                $partnerDentist->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function updateParnerDentist(PartnerDentist $partnerDentist, $comission){
            $partnerDentist->setComission($comission);
        }

        function deletePartnerDentist($CPF){
            try{
                $partnerDentist = $this->getPartnerDentist($CPF);

                $partnerDentist->delete();
            }catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        function getPartnerDentist($CPF){
            $partnerDentist = PartnerDentist::getRecordsByField("CPF", $CPF);
            if(!$partnerDentist)
                throw new NotFoundError("Dentista não encontrado");

            return $partnerDentist[0];
        }

        function getAll(){
            $partnerDentists = PartnerDentist::getRecords();
            if(!$partnerDentists)
                throw new NotFoundError("Nenhum dentista encontrado");

            return $partnerDentists;
        }
    }
    
    return new PartnerDentistServices();
?>