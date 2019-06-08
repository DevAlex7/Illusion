<?php

class List_Invites{
    static private $id;
    static private $namePerson;
    static private $lastnamePerson;
    static private $id_event;
    static private $date;

    public static function set(){
        return new static;
    }
    public static function id($value){
        static::$id = $value;
        return new static;
    }
    public static function namePerson($value){
        static::$namePerson = $value;
        return new static;
    }
    public static function lastnamePerson($value){
        static::$lastnamePerson = $value;
        return new static;
    }
    public static function id_event($value){
        static::$id_event = $value;
        return new static;
    }
    public function date($value){
        $this->date = $value;
        return true;
    }
    public function listInvites(){
        $sql='  SELECT list_invitations_event.id, list_invitations_event.namePerson, list_invitations_event.lastnamePerson 
                FROM (list_invitations_event 
                INNER JOIN events 
                ON list_invitations_event.id_event=events.id 
                AND events.id=?)';
        $params=array(static::$id_event);
        return Database::getRows($sql,$params);
    }
    public function Insert(){
        $sql='INSERT INTO list_invitations_event (namePerson, lastnamePerson, id_event, date) VALUES (?,?,?,?)';
        $params = array(static::$namePerson, static::$lastnamePerson, static::$id_event,$today = date('Y-m-d'));
        return Database::executeRow($sql,$params);
    }
    public function delete(){
        $sql='DELETE FROM list_invitations_event WHERE id=?';
        $params=array(static::$id);
        return Database::executeRow($sql,$params);
    }
}

?>