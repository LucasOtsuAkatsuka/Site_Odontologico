<?php
    require_once(__DIR__."../../../PartnerDentist/Model/PartnerDentist.php");
    require_once(__DIR__."../../../Specialization/Model/Specialization.php");
    require_once(__DIR__."../../../../Database/persist.php");

    class PartnerSpecialization extends persist{
        private PartnerDentist $linkedDentist;
        private Specialization $linkedSpecialization;
        protected $comission;

        protected static $local_filename = "PartnerSpecialization.txt";

        public function __construct(PartnerDentist $linkedDentist, Specialization $linkedSpecialization, $comission){
            $this->linkedDentist = $linkedDentist;
            $this->linkedSpecialization = $linkedSpecialization;
            $this->comission = $comission;
        }

        public function getDentist(){return $this->linkedDentist;}
        public function getSpecialization(){return $this->linkedSpecialization;}

        static public function getFilename(){
            return get_called_class()::$local_filename;
        }
    }
?>