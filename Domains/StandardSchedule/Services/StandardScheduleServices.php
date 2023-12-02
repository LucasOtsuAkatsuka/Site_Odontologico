<?php
    require_once(__DIR__."../../Model/StandardSchedule.php");

    class StandardScheduleServices{
        function create($availability){
            $standardSchedule = new StandardSchedule($availability);
            $standardSchedule->save();
        }
    }
?>