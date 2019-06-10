<?php 

class Replie{
    private static $id;
    private static $id_message;
    private static $id_employee;
    private static $message;
    private static $date;

    public static function set(){
        return new static;
    }
    public static function id($value){
        static::$id = $value;
        return new static;
    }
    public static function id_message($value){
        static::$id_message = $value;
        return new static;
    }
    public static function id_employee($value){
        static::$id_employee = $value;
        return new static;
    }
    public static function message($value){
        static::$message = $value;
        return new static;
    }
    public static function date($value){
        static::$date =$value;
        return new static;
    }

    public static function Reply(){
        $sql='INSERT INTO replies_comments (id_message, id_employee, message, date) VALUES (?,?,?,?)';
        $params=array(static::$id_message,static::$id_employee,static::$message, $today=date('Y-m-d'));
        return Database::executeRow($sql,$params);
    }
    public static function getReplys(){
        $sql='  SELECT employees.id, employees.name, employees.lastname, replies_comments.message 
                FROM ((replies_comments 
                INNER JOIN comments_in_event 
                ON comments_in_event.id=replies_comments.id_message) 
                INNER JOIN employees 
                ON employees.id=replies_comments.id_employee 
                AND comments_in_event.id=?)
                GROUP BY replies_comments.message
                ORDER BY replies_comments.id ASC';
        $params=array(static::$id_message);
        return Database::getRows($sql,$params);
    }

}

?>