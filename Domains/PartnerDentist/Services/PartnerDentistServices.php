<?php
    require(__DIR__ . '/../Model/ParnerDentist.php');

    class PartnerDentistServices{
        function createPartnerDentist($fullName, $email, $phoneNumber, $CPF, $fullAddress, $salary, $comission){
            $partnerDentist = new PartnerDentist($fullName, $email, $phoneNumber, $CPF, $fullAddress, $salary, $comission);

            return $partnerDentist;
        }

        function updateParnerDentist(PartnerDentist $partnerDentist, $comission){
            $partnerDentist->setComission($comission);
        }

        function deletePartnerDentist(){ //Implementar quando o banco de dados for criado

        }
    }
    
    return new PartnerDentistServices();
?>