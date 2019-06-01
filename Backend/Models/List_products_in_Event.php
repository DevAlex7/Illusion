<?php 
class List_products_in_Event extends Validator{
    private $id;
    private $id_product;
    private $count;
    private $id_event;
    private $date;
    private $status;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_product($value){
        if($this->validateId($value)){
            $this->id_product=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function count($value){
        if($this->ValidateInt($value)){
            $this->count=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_event($value){
        if($this->validateId($value)){
            $this->id_event=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function date($value){
        if($this->validateDate($value)){
            $this->date=$value;
            return true;
        }   
        else{
            return false;
        }
    }
    public function exist(){
        $sql='SELECT list_products_event.id_product, list_products_event.id_event FROM list_products_event WHERE list_products_event.id_product=? AND list_products_event.id_event=?';
        $params=array($this->id_product,$this->id_event);
        return Database::getRow($sql,$params);
    }
    public function getCount(){
        $sql='SELECT list_products_event.id, list_products_event.count as count FROM list_products_event WHERE id_product=? AND id_event=?';
        $params=array($this->id_product,$this->id_event);
        return Database::getRow($sql,$params);
    }
    public function save(){
        $sql='INSERT INTO list_products_event (id_product, count, id_event, date) VALUES (?,?,?,?)';
        $params=array($this->id_product,$this->count, $this->id_event, $today = date('Y-m-d'));
        return Database::executeRow($sql,$params);
    }
    public function updateCount(){
        $sql='UPDATE list_products_event SET count=? WHERE id=?';
        $params=array($this->count,$this->id);
        return Database::executeRow($sql,$params);
    }
    public function delete(){
        $sql='DELETE FROM list_products_event WHERE id=?';
        $params=array($this->id);
        return Database::executeRow($sql,$params);
    }
    
}
?>