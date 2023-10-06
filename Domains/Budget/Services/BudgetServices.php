<?php
    require_once(__DIR__."../../Model/Budget.php");
    require_once(__DIR__."../../../../Errors/NotFoundError.php");

    class BudgetServices{
        function createBudget(Patient $patient, Dentist $responsibleDentist, Procedure $procedures, $budgetDate, $detailedDescription){
            try{
                $budget= new Budget($patient, $responsibleDentist, $procedures, $budgetDate, $detailedDescription);
                $budget->save();
            }catch(Exception $e){
                throw new Exception($e->getMessage());
            }
        }

        function deleteBudget($index){
            try{
                $budget = $this->getBudget($index);

                $budget->delete();
            }catch (Exception $e){
                throw new Exception($e->getMessage());
            }
        }
        
        function getBudget($index){
            $budget = Budget::getRecordsByField("index", $index);
            if(!$budget)
                throw new NotFoundError("Orçamento não encontrado");

            return $budget[0];
        }

        function getAll(){
            $budgets = Budget::getRecords();
            if(!$budgets)
                throw new NotFoundError("Nenhum orçamento encontrado");

            return $budgets;
        }
    }

    return new BudgetServices();
?>