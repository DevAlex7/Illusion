<?php 
    class Static_Helpers extends Validator{
        
        //This help me to save the price of the event
        private $price_Event=0.00;

        public function setPrice_Event($price){
            if($this->validateMoney($price)){
                $this->price_Event = $price;
                return true;
            }
            else{
                return false;
            }
        }
        public function getPrice(){
            return $this->price_Event;
        }
    }
?>