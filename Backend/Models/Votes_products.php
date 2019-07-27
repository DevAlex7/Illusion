<?php 
class Votes_products{
    private $id;
    private $id_user;
    private $id_product;
    private $id_vote;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_user($value){
        if($this->validateId($value)){
            $this->id_user=$value;
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
    public function id_vote($value){
        if($this->validateId($value)){
            $this->id_vote=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function exist(){
        $sql='SELECT EXISTS(SELECT 1 FROM votes_products WHERE votes_products.id_product = ? AND votes_products.id_user=?)';
        $params=array($this->id_product,$this->id_user);
        return Database::getRow($sql,$params);
    }
    public function save(){
        $sql='INSERT INTO votes_products VALUES (NULL,?,?,?)';
        $params=array($this->id_user, $this->id_product, $this->id_vote);
        return Database::getRow($sql,$params);
    }
}
?>