<?php 
class Comments{
    private static $id;
    private static $message;
    private static $id_event;
    private static $id_employee;
    private static $date;

    public static function set(){
        return new static;
    }
    public static function id($value){
        static::$id =$value;
        return new static;
    }
    public static function message($value){
        static::$message=$value;
        return new static;
    }
    public static function id_event($value){
        static::$id_event =$value;
        return new static;
    }
    public static function id_employee($value){
        static::$id_employee =$value;
        return new static;
    }
    public static function date($value){
        static::$date=$value;
        return new static;
    }

    public static function Insert(){
        $sql='INSERT INTO comments_in_event (id_event, id_employee, message, date) VALUES (?,?,?,?)';
        $params = array( static::$id_event, static::$id_employee, static::$message, $today=date('Y-m-d'));
        return Database::executeRow($sql,$params);
    }
    public static function getComments(){
        $sql='
                SELECT employees.id, employees.name, employees.lastname, comments_in_event.id AS idMessage ,comments_in_event.message , COUNT(replies_comments.id_message) AS trendingTotal 
                FROM comments_in_event
                LEFT JOIN events
                ON events.id=comments_in_event.id_event                
                LEFT JOIN employees
                ON employees.id=comments_in_event.id_employee 
                LEFT JOIN replies_comments 
                ON comments_in_event.id=replies_comments.id_message 
                WHERE events.id=?  
                GROUP BY comments_in_event.message
                ORDER BY comments_in_event.id ASC
        ';
        $params=array(static::$id_event);
        return Database::getRows($sql,$params);
    }
    

}

?>