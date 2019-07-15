<?php 
class Events_assignments{
    static private $id;
    static private $event;
    static private $request;
    static private $client;

    public static function set(){
        return new static;
    }
    public static function id($value) {
        static::$id = $value;
        return new static;
    }
    public static function event_id($value) {
        static::$event = $value;
        return new static;
    }
    public static function request_id($value) {
        static::$request = $value;
        return new static;
    }
    public static function client_id($value){
        static::$client = $value;
        return new static;
    }
    public static function save(){
        $sql='INSERT INTO event_assignments VALUES (null,?,?,?)';
        $params = array(static::$event, static::$request,static::$client);
        return Database::executeRow($sql,$params);
    }

}
?>