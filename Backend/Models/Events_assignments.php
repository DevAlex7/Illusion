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
    public static function findAssignment(){
        $sql='SELECT event_assignments.id_event, event_assignments.id_request, requests.name_event, CONCAT(employees.name," ",employees.lastname) FROM ((event_assignments INNER JOIN events ON events.id=event_assignments.id_event) INNER JOIN requests ON requests.id = event_assignments.id_request INNER JOIN employees ON employees.id = event_assignments.id_client) WHERE events.id=?';
        $params=array(static::$event);
        return Database::getRow($sql,$params);
    }

}
?>