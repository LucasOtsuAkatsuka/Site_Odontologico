<?php
    require(__DIR__."../../../../Errors/PermissionError.php");
    require_once(__DIR__."../../../../Database/persist.php");

    class Budget extends persist{
        private $patient;
        private $responsibleDentist;
        private $procedures = array();

        private $budgetDate;
        private $totalValue;

        private $isApproved = false;
        private $paymentType = null;
        private $detailedDescription;

        protected static $local_filename = "Budget.txt";

        public function __construct($patient, $responsibleDentist, $procedures, $budgetDate, $detailedDescription){
            $this->patient = $patient;
            $this->responsibleDentist = $responsibleDentist;
            $this->procedures = $procedures;

            $this->budgetDate = $budgetDate;
            $this->detailedDescription = $detailedDescription;

            foreach($procedures as $procedure){
                $this->totalValue += $procedure->getValue();
            }
        }

        public function approveBudget($paymentType){
            $this->isApproved = true;
            $this->paymentType = $paymentType;
        }

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }

        public function getPatient(){return $this->patient;}
        public function getResponsibleDentist(){return $this->responsibleDentist;}
        public function getProcedures(){return $this->procedures;}
        public function getBudgetDate(){return $this->budgetDate;}
        public function getTotalValue(){return $this->totalValue;}
        public function getPaymentType(){return $this->paymentType;}
        public function getApproved(){return $this->isApproved;}
        public function getDetailedDescription(){return $this->detailedDescription;}


        public function setPatient($patient){$this->patient = $patient;}
        public function setResponsibleDentist($responsibleDentist){$this->responsibleDentist = $responsibleDentist;}
        public function setProcedures($procedures){$this->procedures = $procedures;}
        public function setBudgetDate($budgetDate){$this->budgetDate = $budgetDate;}
        public function setTotalValue($totalValue){$this->totalValue = $totalValue;}
        public function setPaymentType($paymentType){
            if($this->isApproved == true)
                $this->paymentType = $paymentType;
            else
                throw new PermissionError("Orçamento não foi aprovado pelo paciente");
        }
        public function setDetailedDescription($detailedDescription){$this->detailedDescription = $detailedDescription;}
    }
?>