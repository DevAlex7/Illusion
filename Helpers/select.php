<?php 

    class Select{

        public static $column_field;
        public static $model_name;
        public static $field_name;
        public static $all="*";
        //ComboBoxes
        public function allFrom($Model){
            $sql='SELECT * FROM '. $Model;
            $params = array(null);
            return Database::getRows($sql, $params);
        }

        //Verify if a email exist
        public function emailWhere($Model , $email){
            $sql='SELECT email FROM '. $Model .' WHERE email = ?';
            $params = array($email);
            return Database::getRow($sql, $params);
        }

        public static function in($Model, $column){
            static::$model_name=$Model;
            static::$column_field=$column;
            return new static;
        }

        public static function all(){
            static::$all;
            return new static;
        }
        public static function from($Model){
            static::$model_name=$Model;
            return new static;
        }
        public function and(){
            static::$and;
            return new static;
        }
        public static function where($field){
            static::$field_name=$field;
            return new static;
        }

        public static function getCount(){
            $sql='SELECT SELECT '.static::$model_name . static::$column_field .'FROM'. static::$model_name .'WHERE '.static::$field_name[0] .'= ?'.static::$and .static::$field_name[1].'= ?';
            $params=array(static::$value_filter[0],static::$value_filter[1]);
            return Database::getRow($sql,$params);
        }
    
        public static function getOne(){
            $sql='SELECT '. static::$column_field .' FROM '.static::$model_name.' WHERE '. static::$column_field .'= ?';
            $params=array(static::$field_name);
            return Database::getRow($sql,$params);
        }
        public static function getAll(){
            $sql='SELECT '. static::$all .' FROM '.static::$model_name;
            $params=array(null);
            return Database::getRows($sql,$params);
        }
        
        public static function findOne(){
            $sql='SELECT '.static::$all .' FROM '.static::$model_name. ' WHERE '.static::$column_field.' = ?';
            $params=array(static::$field_name);
            return Database::getRow($sql,$params);
        }
    }
?>