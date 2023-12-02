<?php
    require_once(__DIR__."../../../../Errors/NotFoundError.php");
    require_once(__DIR__ . '/../Model/Procedure.php');

    class ProcedureServices{
        function createProcedure($type, $description, $value){
            try{
                $procedure = new Procedure($type, $description, $value);
                $procedure->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function deleteProcedure($index){
            try{
                $procedure = $this->getProcedure($index);

                $procedure->delete();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        function getProcedure($index){
            $procedure = Procedure::getRecordsByField("index", $index);
            if(!$procedure)
                throw new NotFoundError("Procedimento não encontrado");

            return $procedure[0];
        }

        function getAll(){
            $procedures = Procedure::getRecords();
            if(!$procedures)
                throw new NotFoundError("Nenhum procedimento encontrado");

            return $procedures;
        }
    }

    return new ProcedureServices();
?>
