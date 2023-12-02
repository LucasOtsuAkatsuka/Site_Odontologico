<?php
    require_once(__DIR__."../..//Model/DebitCard.php");

    class DebitCardServices{
        function createCreditCard($tax){
            $creditCard = new DebitCard($tax);
            $creditCard->save();
        }
    }

    return new DebitCardServices();
?>