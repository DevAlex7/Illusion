<?php 
    require_once('../../libraries/fpdf.php');
    require_once('../../Helpers/validator.php');
    require_once('../../Helpers/select.php');
    require_once('../../Backend/Models/Employees.php');
    require_once('../../Backend/Models/List_invites_in_Event.php');
    require_once('../../Backend/Models/Events.php');
    require_once('../../Backend/Models/Share_events.php');
    require_once('../../Backend/Models/TypeEvents.php');
    require_once('../../Backend/Models/Products.php');
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
        public function InformationEvent($id){
            $event = new Events();
            $shares = new ShareEvents();

            $shares::id_event($id);
            $event->id($id);
             
            //Static information for the event
            $data_event = $event->getInformation();
            
            //colaborators in event
            $colaborators_event = $shares->ListShares();

            //products in event
            $products_event = $event->getProductsinEvent();

            //cost total event
            $cost = $event ->getCostinEvent();

            return array(
               'data_event' => $data_event,
               'collaborators_event' => $colaborators_event,
               'products_event' => $products_event,
               'cost' => $cost
            );
        }
        public function RequestsbyStates(){
            $data = Request::GetRequest();
            return $data;
        }
        public function productsList(){
            $products = new Product();
            $data = $products->all();
            return $data;
        }
        public function eventTypes(){
            $type = new eventTypes();
            $data = $type->type_events_in_Events();
            return $data;
        }
        public function getEventperType($id){
            $type = new eventTypes();
            $type->id($id);
            $data = $type->getEventperType();
            return $data;
        }
    
    }
?>