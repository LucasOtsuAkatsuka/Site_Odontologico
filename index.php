<?php
//Incluindo os Services das classes
    $AppointmentServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Appointment/Services/AppointmentServices.php");
    $AuxiliaryServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Auxiliary/Services/AuxiliaryServices.php");
    $BudgetServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Budget/Model/Budget.php");
    $ClientServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Client/Services/ClientServices.php");
    $EvaluationAppointmentServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/EvaluationAppointment/Services/EvaluationAppointmentServices.php");
    $FixedDentistServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/FixedDentist/Services/FixedDentistServices.php");
    $PartnerDentistServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/PartnerDentist/Services/PartnerDentistServices.php");
    $PartnerSpecializationServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/PartnerSpecialization/Services/PartnerSpecializationServices.php");
    $PatientServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Patient/Services/PatientServices.php");
    $PaymentRecordsServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentRecord/Services/PaymentRecordServices.php");
    $CreditCardServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentTypes/CreditCard/Services/CreditCardServices.php");
    $DebitCardServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentTypes/DebitCard/Services/DebitCardServices.php");
    $MoneyServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentTypes/Money/Services/MoneyServices.php");
    $PIXServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Payment/PaymentTypes/PIX/Services/PIXServices.php");
    $ProcedureServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Procedure/Services/ProcedureServices.php");
    $ProcedureDescriptionServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/ProcedureDescription/Services/ProcedureDescriptionServices.php");
    $ProfileServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Profile/Services/ProfileServices.php");
    $SecretaryServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Secretary/Services/SecretaryServices.php");
    $SpecializationServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Specialization/Services/SpecializationServices.php");

//Classe para fazer Login
    require_once(__DIR__."../../Project-POO-UFMG/Domains/Login/Model/Login.php");
    $login = new Login();

//Funções
    require_once(__DIR__."../../Project-POO-UFMG/Utils/Functions/CheckPermission.php");

//Testes
    
        //Tenta cadastrar um procedimento sem estar logado
        function teste1(){
            global $login;
            $login->getLogged();
    
            global $ProcedureServices;
            $ProcedureServices->createProcedure("Limpeza", "", 200);
        }
        
        //Cadastra um usuário com várias permissões menos a de cadastrar um novo procedimento
        function teste2(){
            try{
                $profileType = "Perfil1";
                global $ProfileServices;
                $ProfileServices->createProfile($profileType);

                $profile1 = $ProfileServices->getProfile(1);
                $profile1->addPermissions('registerPatient');
                $profile1->addPermissions('registerDentist');
                $profile1->addPermissions('registerAuxiliary');
                $profile1->addPermissions('registerSecretary');

                global $AuxiliaryServices;
                $AuxiliaryServices->createAuxiliary("Teste1", "email1@gmail.com", "senha1", "(11) 9111-1111", 150, "endereço1", "065.672.430-74", $profile1);
                
                global $login;
                $login->login("email1@gmail.com", "senha1");
                $user1 = $login->getLogged();

            
                checkPermission($user1, "registerProcedure");

                global $ProcedureServices;
                $ProcedureServices->createProcedure();
            }catch(Exception $e){
                echo($e->getMessage().PHP_EOL);
            }
            
            $login->logout();
        }

        teste2();

    
    

    

    

    
?>