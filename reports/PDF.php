<?php 
    require_once('../../libraries/fpdf.php');
    require_once('../../Helpers/validator.php');
    require_once('../../Backend/Models/Employees.php');
    require_once('../../Backend/Instance/instance.php');

    class PDF extends FPDF{
        
        public function EventsperUser($id){
            $employee = new Employee();
            $employee->id($id);
            $data = $employee->eventsPerUser();
            return $data;  
        }
    }
?>