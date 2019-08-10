<?php 

class ShareEvents{
    private static $id;
    private static $id_event;
    private static $id_employee;

    public static function set(){
        return new static;
    }
    public static function id($value){
        static::$id = $value;
        return new static;
    }
    public static function id_event($value){
        static::$id_event = $value;
        return new static;
    }
    public static function id_employee($value){
        static::$id_employee = $value;
        return new static;
    }
    public static function existInEvent(){
        $sql='  SELECT share_events.id_event, share_events.id_employee, roles.role 
                FROM ((share_events 
                INNER JOIN events ON events.id=share_events.id_event AND events.id=?) 
                INNER JOIN employees ON employees.id=share_events.id_employee AND employees.id=? 
                INNER JOIN roles ON employees.role=roles.id AND roles.id=0)';
        $params=array(static::$id_event,static::$id_employee);
        return Database::getRow($sql,$params);
    }
    public static function Insert(){
        $sql = 'INSERT INTO share_events (id_event, id_employee) VALUES (?,?)';
        $params=array(static::$id_event,static::$id_employee);
        return Database::executeRow($sql,$params);
    }
    public static function existShare(){
        $sql =' SELECT share_events.id_event, share_events.id_employee 
                FROM ((share_events INNER JOIN events ON events.id=share_events.id_event) 
                INNER JOIN employees 
                ON employees.id=share_events.id_employee AND events.id=? AND employees.id=?)';
        $params=array(static::$id_event,static::$id_employee);
        return Database::getRow($sql,$params);
    
        
    }
    public static function ListShares(){
        $sql='SELECT share_events.id, employees.name, employees.lastname 
        FROM ((share_events INNER JOIN events ON events.id=share_events.id_event) INNER JOIN employees
        ON employees.id=share_events.id_employee AND events.id=?)';
        $params=array(static::$id_event);
        return Database::getRows($sql,$params);
    }
    public static function delete(){
        $sql='DELETE FROM share_events WHERE id=?';
        $params=array(static::$id);
        return Database::executeRow($sql,$params);
    }
}

?>