<?php 
    date_default_timezone_set("America/El_Salvador");
    class Binnacle{
        private static $id;
        private static $action;
        private static $user_id;
        
        public static function set(){
            return new static;
        }
        
        public static function id($value){
            static::$id =$value;
            return new static;
        }
        public static function user($value){
            static::$user_id = $value;
            return new static;
        }
        public static function action   ($value){
            static::$action =$value;
            return new static;
        }
 
        public static function getBinnacle(){
            $sql='SELECT binnacle.action_performed, binnacle.date FROM binnacle ORDER BY date DESC';
            $params=array(null);
            return Database::getRows($sql,$params);
        }
     
        public static function insert(){
            $sql='INSERT INTO binnacle (action_performed, id_user, date) VALUES (?,?,?)';
            $params = array(static::$action, static::$user_id, $today = date('Y-m-d'));
            return Database::executeRow($sql,$params);
        }
        public function chartBinnacle(){
            $sql = 'SELECT COUNT(binnacle.id) AS counting, binnacle.date FROM binnacle GROUP BY binnacle.date';
            $params = array(null);
            return Database::getRows($sql, $params);
        }
    }
?>