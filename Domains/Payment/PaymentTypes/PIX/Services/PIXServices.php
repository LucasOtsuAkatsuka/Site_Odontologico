<?php
    require_once(__DIR__."../../Model/PIX.php");

    class PIXServices{
        function createPix(){
            $pix = new PIX();
            $pix->save();
        }
    }

    return new PIXServices();
?>