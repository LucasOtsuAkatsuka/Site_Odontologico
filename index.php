<?php
try{
    $PatientServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Patient/Services/PatientServices.php");
    $ClientServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Client/Services/ClientServices.php");
    $FixedDentistServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/FixedDentist/Services/FixedDentistServices.php");
    $SpecializationServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Specialization/Services/SpecializationServices.php");
    $AppointmentServices = require_once(__DIR__."../../Project-POO-UFMG/Domains/Appointment/Services/AppointmentServices.php");

    //$ClientServices->createClient("Cliente1", "emailCliente1@gmail.com", "numeroTel", "RGfds", "130.924.876-13");
    //$ClientServices->createClient("Cliente2", "emailCliente2@gmail.com", "numeroTel", "RG2", "040.512.362-00");    
    //$ClientServices->deleteClient("130.924.876-13");

    //$clients = Client::getRecords();
    //print_r($clients);

    //$client1 = $ClientServices->getClient("130.924.876-13");
    //print_r($client1);
    //$client2 = $ClientServices->getClient("040.512.362-00");
    //print_r($client2);

    //$PatientServices->createPatient("Paciente1", "emailPaciente1@gmail.com", "numeroTel", "10", "20-10-2002", $client1);
    //$PatientServices->createPatient("Paciente2", "emailPaciente2@gmail.com", "numeroTel", "20", "20-10-2002", $client2);
    $patient1 = $PatientServices->getPatient(10);
    //$patients = Patient::getRecords();
    //print_r($patients);

    //$SpecializationServices->createSpecialization("descrição 1");
    $specialization1 = $SpecializationServices->getSpecialization(1);

    //$FixedDentistServices->createFixedDentist("Dentista1", "emailDentista1@gmail.com", "numeloTel", "130.924.876-13", "endereço", "100 dols", "seilaCRO", $specialization1);
    //$fixedDentists = FixedDentist::getRecords();
    //print_r($fixedDentists);
    $fixedDentist1 = $FixedDentistServices->getFixedDentist("130.924.876-13");

    //$AppointmentServices->createAppointment($patient1, $fixedDentist1, "dia 12", "10 horas", "20 min");
    $appointments = $AppointmentServices->getAll();
    print_r($appointments);
}catch(Exception $e){
    throw new Exception($e->getMessage());
}
?>