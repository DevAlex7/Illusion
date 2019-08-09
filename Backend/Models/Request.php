<?php
date_default_timezone_set("America/El_Salvador"); 
class Request{

    private static $id;
    private static $date_event;
    private static $name_event;
    private static $type_event;
    private static $persons;
    private static $description_event;
    private static $status;
    private static $user_id;
    
    public static function set(){
        return new static;
    }
    public static function name_event($value){
        static::$name_event=$value;
        return new static;
    }
    public static function id($value){
        static::$id=$value;
        return new static;
    }
    public static function date_event($value){
        static::$date_event = $value;
        return new static;
    }
    public static function persons($value){
        static::$persons = $value;
        return new static;
    }
    public static function type_event($value){
        static::$type_event =$value;
        return new static;
    }
    public static function description_event($value){
        static::$description_event =$value;
        return new static;
    }
    public static function default_status(){
        static::$status = 3;
        return new static;
    }
    public static function status($value){
        static::$status = $value;
        return new static;
    }
    public static function user_id($value){
        static::$user_id = $value;
        return new static;
    }

    public static function Insert(){
        $sql='INSERT INTO requests VALUES(null,?,?,?,?,?,?,?,?)';
        $params = array(static::$date_event,static::$name_event,static::$type_event, static::$persons, static::$description_event, static::$status, static::$user_id,$today=date('Y-m-d'));
        return Database::executeRow($sql,$params);
    }
    public static function GetRequest(){
        $sql='  SELECT requests.*, employees.id AS idUser, employees.name, employees.lastname, employees.email, status_requests.status AS status_event, event_types.type AS type_event
                FROM ((requests 
                INNER JOIN employees ON requests.public_user_id=employees.id
                INNER JOIN status_requests ON requests.status=status_requests.id) 
                INNER JOIN event_types ON requests.type_event=event_types.id)
        ';
        $params=array(null);
        return Database::getRows($sql,$params);
    }
    public static function all(){
        $sql='SELECT requests.*, employees.name, employees.lastname FROM (requests INNER JOIN employees ON employees.id=requests.public_user_id ) WHERE requests.id=?';
        $params = array(static::$id);
        return Database::getRow($sql,$params);
    }
    public static function updateStatus(){
        $sql='UPDATE requests SET status=? WHERE id=?';
        $params=array(static::$status, static::$id);
        return Database::executeRow($sql,$params);
    }
    public static function requestPerDay($date1, $date2){
        $sql='SELECT COUNT(*) AS count FROM requests WHERE date_request BETWEEN ? AND ?';
        $params=array($date1,$date2);
        return Database::getRow($sql,$params);
    }
    public static function requestByStates(){
        $sql = 'SELECT status_requests.status, COUNT(requests.id) AS requestsCount FROM (status_requests INNER JOIN requests ON status_requests.id=requests.status) GROUP BY status_requests.status';
        $params = array(null);
        return Database::getRows($sql,$params);
    }
    public static function moreDetailsDate($date1,$date2){
        $sql='SELECT requests.date_request, COUNT(*) AS countperday FROM requests WHERE requests.date_request BETWEEN ? AND ? GROUP BY requests.date_request';
        $params = array($date1,$date2);
        return Database::getRows($sql,$params);
    }
    public static function requestsByUser(){
        $sql='SELECT requests.date_request, COUNT(requests.id) AS countRequest FROM (requests INNER JOIN employees ON employees.id=requests.public_user_id AND employees.id=?) GROUP BY requests.date_request';
        $params=array(static::$user_id);
        return Database::getRows($sql,$params);
    }
    public static function requestsDates($date1, $date2){
        $sql='SELECT requests.date_request, requests.name_event FROM requests WHERE requests.date_request BETWEEN ? AND ? ORDER BY requests.date_request ASC';
        $params=array($date1,$date2);
        return Database::getRows($sql,$params);
    }
}
?>