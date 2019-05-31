<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validator.php');
    require_once('../Helpers/select.php');
    require_once('../Backend/Models/Events.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        
        session_start();
        $result = array('status'=>0,'exception'=>'');
        $select = new Select();
        $event = new Events();

        switch($_GET['request'])
        {
            case 'GET':
                switch($_GET['action']){
                    case 'getEvents':
                        if($result['dataset']=$select->allFrom('events')){
                            $result['status']=1;
                        }   
                        else{
                            $result['exception']='No hay eventos agregados todavia';
                        }
                    break;
                    case 'getId':
                        if(Select::in('events','id')->where($_POST['idEvent'])->getOne()){
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
                    default:
                    exit('acción no disponible');
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    case 'saveEvent':
                        if($event->nameEvent($_POST['EventName'])){
                            if($event->date($_POST['DateEvent'])){
                                if($event->clientName($_POST['NameClient'])){
                                    if($event->id_employee($_SESSION['idUser'])){
                                        if($event->price('0.00')){
                                            if($event->pay_status(2)){
                                                if($event->type_event($_POST['TypeEventSelect'])){
                                                    if($event->place($_POST['PlaceEvent']))
                                                    {
                                                        
                                                        $event->save();
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
                        else{
                            $result['exception']='Nombre de evento incorrecto';
                        }
                    break;
                    default: 
                    exit('acción no disponible');
                }
            break;
            case 'PUT':
            
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