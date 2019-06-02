<?php 
date_default_timezone_set("America/El_Salvador");
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
    public function price($value){
        if($this->validateMoney($value)){
            $this->price = $value;
            return true;
        }
        else{
            return false;
        }   
    }

    public function save(){
        $sql='INSERT INTO products (nameProduct, count, date, id_employee, price) VALUES (?,?,?,?,?)';
        $params=array($this->nameProduct, $this->count , $today = date("Y-m-d"), $this->id_employee, $this->price );
        return Database::executeRow($sql,$params);
    }
    public function edit(){
        $sql = 'UPDATE products SET nameProduct=?, count=?, price=? WHERE id=?';
        $params=array($this->nameProduct, $this->count, $this->price, $this->id);
        return Database::executeRow($sql,$params);
    }
    public function delete(){

    }
    public function find(){
        $sql='  SELECT products.id, products.nameProduct, products.count, products.date, employees.name, employees.lastname, products.price 
                FROM (( products 
                INNER JOIN employees 
                ON employees.id=products.id_employee 
                AND products.id=?))';
        $params=array($this->id);
        return Database::getRow($sql,$params);
    }
    public function editCount(){
        $sql='UPDATE products SET count=? WHERE id=?';
        $params=array($this->count,$this->id);
        return Database::executeRow($sql,$params);
    }

}

?>