<?php 

class eventTypes extends Validator{
    
    private $id;
    private $type;
    private $search;

    public function valueSearch($value){
       if($this->validateAlphanumeric($value,1,50)){
        $this->search =$value;
        return true;
       }
       else{
           return false;
       }
    }
    public function getTypeEvent(){
        return $this->type;
    }
    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }   
    public function type($value){
        $this->type=$value;
        return true;
    }
    public function save(){
        $sql = 'INSERT INTO event_types (type) VALUES (?)';
        $params = array($this->type);
        return Database::executeRow($sql,$params);
    }
    public function search(){
        $sql='SELECT * FROM event_types WHERE type LIKE ?';
        $params=array("%$this->search%");
        return Database::getRows($sql,$params);
    }
    public function edit(){
        $sql='UPDATE event_types SET type=? WHERE id=?';
        $params = array($this->type,$this->id);
        return Database::executeRow($sql,$params);
    }
    public function delete(){
        $sql='DELETE FROM event_types WHERE id=?';
        $params=array($this->id);
        return Database::executeRow($sql,$params);
    }
}

?>