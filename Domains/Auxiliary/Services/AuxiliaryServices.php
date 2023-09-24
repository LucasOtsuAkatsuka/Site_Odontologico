<?php   
    class AuxiliaryServices{
        function createAuxiliary($fullName, $email, $phoneNumber, $salary, $fullAddress, $CPF){
            $auxiliary = new Auxiliary($fullName, $email, $phoneNumber, $salary, $fullAddress, $CPF);

            return $auxiliary;
        }

        function updateAuxiliary(){

        }

        function deleteAuxiliary(){
            
        }
    }

    return new AuxiliaryServices();
?>