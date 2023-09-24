<?php
    require(__DIR__ . '/../Model/FixedDentist.php');

    class FixedDentistServices{
        function createFixedDentist($fullName, $email, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, $specialization){
            $fixedDentist = new FixedDentist($fullName, $email, $phoneNumber, $CPF, $fullAddress, $salary, $CRO, $specialization);

            return $fixedDentist;
        }

        function updateFixedDentist(FixedDentist $fixedDentist, $specialization){
            $fixedDentist->setSpecialization($specialization);
        }

        function deleteFixedDentist(){ //Implementar quando o banco de dados for criado

        }
    }

    return new FixedDentistServices();
?>