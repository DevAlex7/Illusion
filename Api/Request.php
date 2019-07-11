<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Backend/Models/Request.php');
    require_once('../Helpers/validates.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        
        session_start();
        $result = array('status'=>0, 'exception'=>'');
        switch($_GET['request'])
        {
            case 'GET':
                switch($_GET['action']){
                    case 'listRequests':
                        if($result['dataset']=Request::GetRequest()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay solicitudes en lista';
                        }
                    break;
                    default:
                    exit('acción no disponible');
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    case 'sendRequest':
                        if(Validate::this($_POST['nameEvent'],2,100)->Alphanumeric()){
                            if(Validate::Integer($_POST['typeEvents'])->Id()){
                                if(Validate::Integer($_POST['countPerson'])->Id()){
                                    if(Validate::this($_POST['descriptionEvent'],2,200)->Alphanumeric()){
                                        $var = $_POST['date'];
                                        $date = str_replace('/', '-', $var);
                                        $dateuser = date('Y-m-d', strtotime($date));
                                        
                                        if($dateuser >= $today = date('Y-m-d')){
                                            Request::set()
                                            ->date_event($var)
                                            ->name_event($_POST['nameEvent'])
                                            ->type_event($_POST['typeEvents'])
                                            ->persons($_POST['countPerson'])
                                            ->description_event($_POST['descriptionEvent'])
                                            ->default_status()
                                            ->user_id($_SESSION['idPublicUser'])
                                            ->Insert();
                                            $result['status']=1;
                                        }
                                        else{
                                            $result['exception']='No puede solicitar eventos con fechas pasadas';
                                        }
                                    }
                                    else{
                                        $result['exception']='Descripción no valida';
                                    }
                                }
                                else{
                                    $result['exception']='Dato de cantidad de personas invalido';
                                }
                            }
                            else{
                                $result['exception']='No se ha seleccionado un tipo de evento';
                            }
                        }
                        else{
                            $result['exception']='Nombre de evento invalido';
                        }
                    break;
                    default: 
                    exit('acción no disponible');
                }
            break;
            case 'PUT':
                switch($_GET['action']){
                    case 'updateRequest':
                        if(Validate::Integer($_POST['id'])->Id()){
                            if(Validate::Integer($_POST['status'])->Id()){
                                if(Request::set()->id($_POST['id'])->status($_POST['status'])->updateStatus()){
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception']='Fallo';
;                                }
                            }
                            else{
                                $result['exception']='No hay información de el estatus';                            
                            }
                        }
                        else{
                            $result['exception']='No hay información de la solicitud';
                        }
                    break;
                    default:
                    exit('Acción no disponible');
                }
            break;
            case 'DELETE':
                switch($_GET['action']){
                   
                    default:
                    exit('Acción no disponible');
                }
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