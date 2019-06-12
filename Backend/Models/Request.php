<?php 
class Request{
    private static $id;
    private static $name_client;
    private static $last_name;
    private static $email;
    private static $date_event;
    private static $phone_number;
    private static $type_event;
    private static $description_event;
    private static $status;

    
    public static function set(){
        return new static;
    }
    public static function id($value){
        static::$id=$value;
        return new static;
    }
    public static function name_client($value){
        static::$name_client = $value;
        return new static;
    }
    public static function last_name($value){
        static::$last_name =$value;
        return new static;
    }
    public static function email($value){
        
    }
    
}
?>