<?php 

    class Update{
        static public $field_column;
        static public $model_name;
        static public $operator_symbol;
        static public $field_param;
        static public $value_param;
        static public $change_value;
        
        public static function set($Model,$field){
            static::$model_name=$Model;
            static::$field_column=$field;
            return new static;
        }
        public static function replace($change){
            static::$change_value = $change;
            return new static;
        }
        public static function where($field, $operator ,$value){
            static::$field_param = $field;
            static::$operator_symbol = $operator;
            static::$value_param = $value;
            return new static;
        }
        public static function updateOne(){
            $sql='UPDATE '.static::$model_name.' SET '.static::$field_column.' =? WHERE '.static::$field_param.static::$operator_symbol.'?';
            $params = array(static::$change_value,static::$value_param);
            return Database::executeRow($sql,$params);
        }
    }

?>