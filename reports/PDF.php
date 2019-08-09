<?php 
    require_once('../../libraries/fpdf.php');
    require_once('../../Helpers/validator.php');
    require_once('../../Backend/Models/Employees.php');
    require_once('../../Backend/Models/List_invites_in_Event.php');
    require_once('../../Backend/Models/Request.php');
    require_once('../../Backend/Instance/instance.php');

    class PDF extends FPDF{
        
        public function EventsperUser($id){
            $employee = new Employee();
            $employee->id($id);
            $data = $employee->eventsPerUser();
            return $data;  
        }
        public function InvitesperEvent($id){
            $event = new List_Invites();
            $event->id_event($id);
            $data = $event->listInvites();
            return $data;
        }
        public function RequestsperDate($date1, $date2){
            $recipe1 = str_replace('/', '-', $date1);
            $recipe2 = str_replace('/', '-', $date2);

            $data = Request::requestsDates($recipe1,$recipe2);

            return $data;
        }
    }
?>