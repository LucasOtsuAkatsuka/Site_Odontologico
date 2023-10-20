<?php   
    require_once(__DIR__."../../Model/Auxiliary.php");
    require_once(__DIR__."../../../../Errors/NotFoundError.php");
    require_once(__DIR__."../../../../Functions/checkCpf.php");
    require_once(__DIR__."../../../../Functions/checkEmail.php");

    class AuxiliaryServices{
        function createAuxiliary($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF){
            try{
                checkEmail($email);
                checkCpf($CPF);

                $auxiliary = new Auxiliary($fullName, $email, $password, $phoneNumber, $salary, $fullAddress, $CPF);
                $auxiliary->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function deleteAuxiliary($CPF){
            try{
                $auxiliary = $this->getAuxiliary($CPF);

                $auxiliary->delete();
            }catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        function getAuxiliary($CPF){
            $auxiliary = Auxiliary::getRecordsByField("CPF", $CPF);
            if(!$auxiliary)
                throw new NotFoundError("Auxiliar não encontrado");

            return $auxiliary[0];
        }

        function getAll(){
            $auxiliaries = Auxiliary::getRecords();
            if(!$auxiliaries)
                throw new NotFoundError("Nenhum auxiliar encontrado");

            return $auxiliaries;
        }
    }

    return new AuxiliaryServices();
?>