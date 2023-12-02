<?php
    require_once("../Project-POO-UFMG/Domains/PartnerSpecialization/Model/PartnerSpecialization.php");

    class PartnerSpecializationServices{
        function createPartnerSpecialization(PartnerDentist $linkedDentist, Specialization $linkedSpecialization, $comission){
            $partnerSpecialization = new PartnerSpecialization($linkedDentist, $linkedSpecialization, $comission);
            $partnerSpecialization->save();
        }
    }

    return new PartnerSpecializationServices();
?>