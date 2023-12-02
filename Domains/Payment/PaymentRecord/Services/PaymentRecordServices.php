<?php
    require_once(__DIR__."../../Model/PaymentRecord.php");

    class PaymentRecordServices{
        function createPaymentRecord($paidValue, PaymentType $paymentType, $paymentDate){
            $paymentRecord = new PaymentRecord($paidValue, $paymentType, $paymentDate);
            $paymentRecord->save();
        }
    }

    return new PaymentRecordServices();
?>