<?php 
    class Binnacle{
        public static function getBinnacle(){
            $sql='SELECT binnacle.year, binnacle.action_performed, binnacle.date FROM binnacle ORDER BY year DESC';
            $params=array(null);
            return Database::getRows($sql,$params);
        }
    }
?>