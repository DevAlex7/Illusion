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
        static::$email =$value;
        return new static;
    }
    public static function date_event($value){
        static::$date_event = $value;
        return new static;
    }
    public static function phone_number($firstDigits, $secondDigits){
        if(strlen($firstDigits)>4 || strlen($secondDigits)>4){
            return false;
        }
        else{
             
            static::$phone_number=$firstDigits.'-'.$secondDigits;;
            return new static;
        }
    }
    public static function type_event($value){
        static::$type_event =$value;
        return new static;
    }
    public static function description_event($value){
        static::$description_event =$value;
        return new static;
    }
    public static function status(){
        static::$status = 3;
        return new static;
    }

    public static function Insert(){
        $sql='INSERT INTO requests (name_client, last_name, e_mail, date_event, phone_number, type_event, description_event, status) VALUES (?,?,?,?,?,?,?,?)';
        $params = array(static::$name_client, static::$last_name, static::$email, static::$date_event ,static::$phone_number, static::$type_event, static::$description_event, static::$status);
        return Database::executeRow($sql,$params);
    }
    
}
?>