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

//Tenta cadastrar um procedimento com um usuário que não tem permissão
function teste2(){
    try{
        $profileType = "Perfil1";
        global $ProfileServices;
        $ProfileServices->createProfile($profileType);

        $profile = $ProfileServices->getProfile(1);
        $profile->addPermissions('registerSpecialization');
        $profile->addPermissions('registerPaymentType');
        $profile->addPermissions('registerDentist');
        $profile->addPermissions('registerPatient');
        $profile->addPermissions('registerClient');
        $profile->addPermissions('registerAppointment');
        $profile->addPermissions('registerBudget');
        $profile->addPermissions('approveBudget');
        $profile->addPermissions('calculateMonthlyFinances');
        $profile->addPermissions('registerStandardSchedule');

        global $AuxiliaryServices;
        $AuxiliaryServices->createAuxiliary("Teste1", "email1@gmail.com", "senha1", "(11) 9111-1111", 150, "endereço1", "065.672.430-74", $profile);
        
        global $login;
        $login->login("email1@gmail.com", "senha1");
        $user = $login->getLogged();
        print_r($user);

    
        checkPermission($user, "registerProcedure");

        global $ProcedureServices;
        $ProcedureServices->createProcedure();
    }catch(Exception $e){
        echo($e->getMessage().PHP_EOL);
    }
    
    $login->logout();
}

//Loga com um usuário que tem todas as permissões para cadastrar procedimentos
function teste3(){
    try{
        $profileType = "Administrador";
        global $ProfileServices;
        $ProfileServices->createProfile($profileType);

        $profile = $ProfileServices->getProfile(1);
        $profile->addPermissions('registerProcedure');
        $profile->addPermissions('registerSpecialization');
        $profile->addPermissions('registerPaymentType');
        $profile->addPermissions('registerDentist');
        $profile->addPermissions('registerPatient');
        $profile->addPermissions('registerClient');
        $profile->addPermissions('registerAppointment');
        $profile->addPermissions('registerBudget');
        $profile->addPermissions('approveBudget');
        $profile->addPermissions('calculateMonthlyFinances');
        $profile->addPermissions('registerStandardSchedule');
         
        global $AuxiliaryServices;
        $AuxiliaryServices->createAuxiliary("Adm", "emailADM@gmail.com", "senhaADM", "(ADM) TEL-ADM", 150, "endereçoADM", "913.498.150-04", $profile);
        
        global $login;
        $login->login("emailADM@gmail.com", "senhaADM");
        $user = $login->getLogged();
    
        checkPermission($user, "registerSpecialization");
        global $SpecializationServices;
        $SpecializationServices->createSpecialization("Clínica Geral");
        $specialization1 = $SpecializationServices->getSpecialization(1);
        $SpecializationServices->createSpecialization("Endodontia");
        $specialization2 = $SpecializationServices->getSpecialization(2);
        $SpecializationServices->createSpecialization("Cirurgia");
        $specialization3 = $SpecializationServices->getSpecialization(3);
        $SpecializationServices->createSpecialization("Estética");
        $specialization4 = $SpecializationServices->getSpecialization(4);

        checkPermission($user, "registerProcedure");
        global $ProcedureServices;
        $ProcedureServices->createProcedure("Limpeza", "", 200.00, $specialization1);
        $ProcedureServices->createProcedure("Restauração", "", 185.00, $specialization1);
        $ProcedureServices->createProcedure("Extração Comun", "Não inclui dente siso.", 280.00, $specialization1);
        $ProcedureServices->createProcedure("Canal", "", 800.00, $specialization2);
        $ProcedureServices->createProcedure("Extração de Siso", "Valor por dente.", 400.00, $specialization3);
        $ProcedureServices->createProcedure("Clareamento a Laser", "", 1700.00, $specialization4);
        $ProcedureServices->createProcedure("Clareamento de Moldeira", "Clareamento Caseiro", 900.00, $specialization4);
    }catch(Exception $e){
        echo($e->getMessage().PHP_EOL);
    }
}    

//Cria formas de pagamento permitidas pela clínica
function teste4(){
    try{
        global $login;
        $user = $login->getLogged();

        global $MoneyServices;
        global $PIXServices;
        global $DebitCardServices;
        global $CreditCardServices;

        checkPermission($user, "registerPaymentType");
        $MoneyServices->createMoney();
        $PIXServices->createPIX();
        $DebitCardServices->createDebitCard(0.03);
        $CreditCardServices->createCreditCard(0.04, "1 a 3x");
        $CreditCardServices->createCreditCard(0.07, "4 a 6x");
    }catch(Exception $e){
        echo($e->getMessage().PHP_EOL);
    }
}

//Cadastra um dentista fixo e um dentista parceiro
function teste5(){
    try{
        global $login;
        $user = $login->getLogged();

        global $PartnerDentistServices;
        global $FixedDentistServices;

        checkPermission($user, "registerDentist");
        
        global $SpecializationServices;
        $specialization1 = $SpecializationServices->getSpecialization(1); //Clínica Geral
        $specialization2 = $SpecializationServices->getSpecialization(2); //Edotontia
        $specialization3 = $SpecializationServices->getSpecialization(3); //Cirurgia
        $specialization4 = $SpecializationServices->getSpecialization(4); //Estética
        
    }catch(Exception $e){
        echo($e->getMessage().PHP_EOL);
    }
}




?>