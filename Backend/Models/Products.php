<?php 

class Product extends Validator{
    private $id;
    private $nameProduct;
    private $count;
    private $date;
    private $id_employee;
    private $price;

    public function id($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function nameProduct($value){
        if($this->validateAlphanumeric($value,3,150)){
            $this->nameProduct=$value;
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
    public function id_employee($value){
        if($this->validateId($value)){
            $this->id_employee=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function 

}

?>