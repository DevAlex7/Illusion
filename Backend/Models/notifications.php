<?php 
    class Notification
    {
        public function sendHelpBlock($username,$id){
            $message = $username.' tiene la cuenta suspendida debido a varios intentos de bloqueo';
            $sql='INSERT INTO notifications VALUES (NULL,?,?)';
            $params = array($message,$id);
            return Database::executeRow($sql,$params);
        }
        public function getBlocks(){
            $sql='SELECT employees.id, notifications.notification FROM (notifications INNER JOIN employees ON employees.id = notifications.id_user) WHERE employees.status = 3';
            $params = array(null);
            return Database::getRows($sql,$params);
        }
        
    }
?>