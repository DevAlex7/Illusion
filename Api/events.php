<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validator.php');
    require_once('../Helpers/select.php');
    require_once('../Helpers/update.php');
    require_once('../Backend/Models/Events.php');
    require_once('../Backend/Models/Events_assignments.php');
    require_once('../Helpers/validates.php');  
    require_once('../Backend/Models/Binnacle.php');
    require_once('../Backend/Models/Employees.php');
    require_once('../Backend/Models/Share_events.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        session_start();
        $result = array('status'=>0,'exception'=>'','price'=>0,'role'=>0,'lastId'=>0);
        $validate = new Validator();
        $select = new Select();
        $update = new Update();
        $event = new Events();
        $rules = new Validate();
        switch($_GET['request'])
        {
            case 'GET':
                switch($_GET['action']){
                    case 'getEvents':
                        if($result['dataset']=$event->all()){
                            $result['status']=1;
                        }   
                        else{
                            $result['exception']='No hay eventos agregados todavia';
                        }
                    break;
                    case 'chartEvent':
                    if ($result['dataset'] = $event->chartEvent()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                    break;
                    case 'chartByProducts':
                    if ($result['dataset'] = $event->chartByProducts($_POST['count'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
                    break;
                    case 'getId':
                        if(Select::in('events','id')->where('id',$_POST['idEvent'])->getOne()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='events.php';
                        }
                    break;
                    case 'getallbyId':
                        if($event->id($_POST['idEvent'])){
                            if($result['dataset']=$event->getInformation()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay información del evento seleccionado';
                            }
                        }
                        else{
                            $result['exception']='No se encontro información proveniente';
                        }
                    break;
                    case 'getProducts':
                        if($event->id($_POST['idEvent'])){
                            if($result['dataset']=$event->getProductsinEvent()){
                                $result['role']=$_SESSION['Role'];
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay productos en este evento';
                            }
                        }
                        else{
                            $result['exception']='No hay información de evento para listar productos';
                        }
                    break;
                    case 'getCountProduct':
                        if(Select::in('list_products_event','count')->from('list_products_event')->where('id_product'.$_POST['idProduct'],'id_event',$_POST['idEvent'])){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Fallo';
                        }
                    break;
                    case 'getPrice':
                        if($event->id($_POST['idEvent'])){
                            
                            $event_info = $event->getCostinEvent();
                            
                            if($event_info['Cost']==0){
                                $result['price']=0.00;
                                $result['status']=2;
                            }
                            else{
                                $result['price']=$event_info['Cost'];
                                $result['status']=1;
                            }
                        }
                        else{
                            $result['exception']='Evento no definido';
                        }
                    break;
                    case 'getCostsinEvents':
                        if($result['dataset']=$event->getEventsCosts()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay costos';
                        }
                    break;
                    case 'Lost':
                        if($result['dataset']=$event->getTotalLost()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay información de eventos con productos';
                        }
                    break;
                    case 'Win':
                        if($result['dataset']=$event->getTotalWin()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay información de eventos con productos';
                        }
                    break;
                    case 'getMyEvents':
                        if($event->id_employee($_SESSION['idUser'])){
                            if($result['dataset']=$event->getMyEvents()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay eventos creados por ti';
                            }
                        }
                        else{
                            $result['exception']='no hay información para brindarte información';
                        }
                    break;
                    case 'verifyActions':
                            if($event->id($_POST['idEvent'])){
                                if($event->id_employee($_SESSION['idUser'])){
                                    //Verifica si ese empleado creo el evento 
                                    if($event->verifyCreator()){
                                        //Si el lo creo le da los permisos
                                        $result['status']=1;
                                    }
                                    else{
                                        //verifica si es colaborador del evento
                                        if(ShareEvents::set()->id_event($_POST['idEvent'])->id_employee($_SESSION['idUser'])->existInEvent()){
                                            $result['status']=2;
                                        }
                                        else{
                                            $result['exception']='No tienes permisos de este evento';
                                        }
                                    }
                                }
                                else{
                                    $result['exception']='Usuario no definido';
                                }
                            }
                            else{
                                $result['exception']='Información del evento no definido';
                            }
                    break;
                    case 'SharesEvents':
                        if($event->id_employee($_SESSION['idUser'])){
                            if($result['dataset']=$event->getSharesEvents()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No tiene eventos compartidos todavia';
                            }
                        }
                        else{
                            $result['exception']='No podemos conseguir información de sus eventos compartidos';
                        }
                    break;
                    case 'getCountCollaborators':
                        if($event->id($_POST['idEvent'])){
                            if($result['dataset']=$event->getCollaborators()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='0';
                            }
                        }
                        else{
                            $result['exception']='Evento no definido';
                        }
                    break;
                    case 'ListAdmins':
                        if($event->id($_POST['idEvent'])){
                                if($result['dataset']=$event->ListAdministrators()){
                                    $result['status']=1;
                                    $result['idActive'] = $_SESSION['idUser'];
                                }   
                                else{
                                    $result['exception']='Ya no hay administradores para agregar';
                                }  
                        }else{
                            $result['exception']='No hay información del evento';
                        }
                    break;
                    case 'eventsbyState':
                        if($result['dataset']=$event->eventsByStates()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay datos preliminares';
                        }
                    break;
                    default:
                    exit('acción no disponible');
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    case 'saveEvent':
                        if($event->nameEvent($_POST['EventName'])){
                            if($validate->validateToday($_POST['DateEvent'])){
                                if($event->date($_POST['DateEvent'])){
                                    if($event->clientName($_POST['NameClient'])){
                                        if($event->id_employee($_SESSION['idUser'])){
                                            if($event->price('0.00')){
                                                if($event->pay_status(2)){
                                                    if($event->type_event($_POST['TypeEventSelect'])){
                                                        if($event->place($_POST['PlaceEvent']))
                                                        {
                                                            $event->save();
                                                            Binnacle::set()->user($_SESSION['idUser'])->action("ha ingresado un evento nuevo: ".$event->getEventName())->insert();
                                                            $result['status']=1;
                                                        }
                                                        else{
                                                            $result['exception']='Mal formato de HTML';
                                                        }
                                                    }
                                                    else{
                                                        $result['exception']='No se ha seleccionado ningun tipo de evento';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='El estado de pago del evento ha fallado';
                                                }
                                            }
                                            else{
                                                $result['exception']='Mal formato de precio sobre el evento';
                                            }
                                        }   
                                        else{
                                            $result['exception']='Algo ha fallado con el usuario logueado';
                                        }
                                    }
                                    else{
                                        $result['exception']='Nombre de cliente incorrecto';
                                    }
                                }
                                else{
                                    $result['exception']='Fecha mal ingresada. Formato de fecha Año-Mes-Dia';
                                }
                            }
                            else
                            {
                                $result['exception']='No se pueden crear eventos con fechas anteriores a la de hoy';
                            }
                        }
                        else{
                            $result['exception']='Nombre de evento incorrecto';
                        }
                    break;
                    case 'Search':
                        if($event->searchbyUser($_POST['SearchInput'])){
                            if($result['dataset']=$event->search()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay resultados';
                            }
                        }
                        else{
                            $result['exception']='Busqueda invalida';
                        }
                    break;
                    case 'searchMyEvent':
                        if($event->searchbyUser($_POST['SearchMyEventsInput'])){
                            if($event->id_employee($_SESSION['idUser'])){
                                if($result['dataset']=$event->searchInMyEvents()){
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception']='No hay resultados';
                                }
                            }
                            else{
                                $result['exception']='No hay información de usuario para busquedas';
                            }
                        }
                        else{
                            $result['exception']='Busqueda invalida';
                        }
                    break;
                    case 'searchInShares':
                            if($event->searchbyUser($_POST['SearchMyEventsInput'])){
                                if($result['dataset']=$event->search()){
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception']='No hay coincidencias';
                                }
                            }
                            else{
                                $result['exception']='Busqueda invalida';
                            }
                    break;  
                    case 'AssignmentRequest':
                        if( Validate::Integer($_POST['idEvent'])->Id() ){
                            Events_assignments::set()->event_id($_POST['idEvent']);
                            if($result['dataset'] = Events_assignments::findAssignment()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='Este evento no tiene una solicitud proveniente';
                            }
                        }
                        else{
                            $result['exception']='No se ha identificado el evento';
                        }
                    break;
                    default: 
                    exit('acción no disponible');
                }
            break;
            case 'PUT':
                switch($_GET['action']){
                    case 'updateOne':
                        if($validate->validateId($_POST['IdEventEdit'])){
                            if($validate->validateAlphanumeric($_POST['NameEventEdit'],5,150)){
                               if($validate->validateId($_SESSION['idUser'])){
                                    if($event->id($_POST['IdEventEdit'])){
                                        if($event->id_employee($_SESSION['idUser'])){
                                            if($event->verifyCreator()){
                                                Update::set('events','name_event')
                                                ->replace($_POST['NameEventEdit'])
                                                ->where('id','=',$_POST['IdEventEdit'])
                                                ->updateOne();
                                                $result['status']=1;
                                            }
                                            else{
                                                //verifica si es colaborador del evento
                                                if(ShareEvents::set()->id_event($_POST['IdEventEdit'])->id_employee($_SESSION['idUser'])->existInEvent()){
                                                    Update::set('events','name_event')
                                                    ->replace($_POST['NameEventEdit'])
                                                    ->where('id','=',$_POST['IdEventEdit'])
                                                    ->updateOne();
                                                    $result['status']=2;
                                                }
                                                else{
                                                    $result['exception']='No tienes permisos de este evento';
                                                }
                                            }   
                                        }
                                        else{
                                            $result['exception']='No hay información de usuario para verificar';
                                        }
                                    }
                                    else{
                                        $result['exception']='No hay información de evento';
                                    }
                               }
                               else{
                                    $result['exception']='No hay información de usuario ';
                               }
                            }
                            else{
                                $result['exception']='El nombre del evento es invalido';
                            }
                        }
                        else{
                            $result['exception']='No hay información';
                        }
                    break;
                    case 'updateInfoEvent':
                        if($event->id($_POST['EditIdEventInfo'])){
                            if($event->type_event($_POST['TypeEventsEdit'])){
                                if($event->date($_POST['DateEdit'])){
                                    if($rules->date($_POST['DateEdit'])->afterToday()){
                                        if($event->id_employee($_SESSION['idUser'])){
                                            if($event->verifyCreator()){
                                                $event->updateInfo();
                                                $result['status']=1;
                                            }
                                            else{
                                                //verifica si es colaborador del evento
                                                if(ShareEvents::set()->id_event($_POST['EditIdEventInfo'])->id_employee($_SESSION['idUser'])->existInEvent()){
                                                    $event->updateInfo();
                                                    $result['status']=2;
                                                }
                                                else{
                                                    $result['exception']='No tienes permisos de este evento';
                                                }
                                            }
                                        }
                                        else{
                                            $result['exception']='No hay información de usuario';
                                        }
                                    }
                                    else{
                                        $result['exception']='No puedes ingresar fechas inferiores a la de ahora';
                                    }
                                }   
                                else{
                                    $result['exception']='Mal formato de fecha';
                                }
                            }
                            else{
                                $result['exception']='No se ha seleccionado ningun tipo de evento';
                            }
                        }
                        else{
                            $result['exception']='No hay información del evento';
                        }
                    break;
                    case 'editMap':
                        if(Validate::Integer($_POST['EditMapId'])->Id()){
                            if(Validate::type($_POST['EditMap'])->HTML()){
                                if($event->id($_POST['EditMapId'])){
                                    if($event->id_employee($_SESSION['idUser'])){
                                        if($event->verifyCreator()){
                                            Update::set('events','place')->replace($_POST['EditMap'])->where('id','=',$_POST['EditMapId'])->updateOne();
                                            $result['status']=1;
                                        }
                                        else{
                                            //verifica si es colaborador del evento
                                            if(ShareEvents::set()->id_event($_POST['EditMapId'])->id_employee($_SESSION['idUser'])->existInEvent()){
                                                Update::set('events','place')
                                                ->replace($_POST['EditMap'])
                                                ->where('id','=', $_POST['EditMapId'])
                                                ->updateOne();
                                                $result['status']=2;
                                            }
                                            else{
                                                $result['exception']='No tienes permisos de este evento';
                                            }
                                        }
                                    }
                                    else{
                                        $result['exception']='No hay información de usuario';
                                    }
                                }
                                else{
                                    $result['exception']='No hay información de evento para verificación';
                                }
                            }
                            else{
                                $result['exception']='Formato incorrecto de HTML ';
                            }
                        }
                        else{
                            $result['exception']='No hay información del evento';
                        }
                    break;
                    default:
                    exit('acción no disponible');
                }
            break;
            case 'DELETE':
            
            break;

            default:
    
            exit('Petición rechazada');
        }
        print(json_encode($result));
    }
    else{
        exit('Petición Http y acción no definidas');
    }
?>