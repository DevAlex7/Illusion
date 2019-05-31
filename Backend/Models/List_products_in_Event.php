<?php 
class List_products_in_Event extends Validator{
    private $id;
    private $id_product;
    private $count;
    private $id_event;
    private $date;
    private $status;

    public function id($value){
        if($this->ValidateInt($value)){
            $this->id=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function id_product($value){
        if($this->ValidateInt($value)){
            $this->id_product=$value;
            return true;
        }
        else{
            return false;
        }
    }
    public function count(){

    }
    public function id_event(){

    }
    public function date(){

    }
    public function status(){

    }
}
?>