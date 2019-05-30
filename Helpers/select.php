<?php 

    class Select{
        
        //Verify if a email exist
        public function emailWhere($Model , $email){
            $sql='SELECT email FROM '. $Model .' WHERE email = ?';
            $params = array($email);
            return Database::getRow($sql, $params);
        }

    }


?>