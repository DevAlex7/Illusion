<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validates.php');
    require_once('../Backend/Models/Share_events.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        session_start();
        $result = array('status'=>0, 'exception'=>'');

        switch($_GET['request']){
            case 'GET':
                switch($_GET['action']){
                    case 'getListShares':
                        if(Validate::Integer($_POST['idEvent'])->Id()){
                            if($result['dataset']=ShareEvents::id_event($_POST['idEvent'])->ListShares()){
                                $result['status']=1;
                                $result['idActive'] = $_SESSION['idUser'];
                            }
                            else{
                                $result['exception']='No hay administradores en este evento';
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
            case 'POST':
                switch($_GET['action']){
                    case 'SaveShare':
                        if(Validate::Integer($_POST['idEvent'])->Id()){
                            if(Validate::Integer($_POST['id_employee'])->Id()){
                                if(!ShareEvents::set()->id_event($_POST['idEvent'])->id_employee($_POST['id_employee'])->existShare()){
                                    ShareEvents::set()->id_event($_POST['idEvent'])->id_employee($_POST['id_employee'])->Insert();
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception']='Administrador ya existente';
                                }
                            }
                            else{
                                $result['exception']='No encontramos información del usuario';
                            }
                        }
                        else{
                            $result['exception']='No encontramos información del evento';
                        }
                    break;
                    default:
                    exit('acción no dispnible');
                    break;
                }
            break;
            case 'PUT':
            break;
            case 'DELETE':
                switch($_GET['action']){
                    case 'deleteShare':
                        if(Validate::Integer($_POST['id_share'])->Id()){
                            ShareEvents::set()->id($_POST['id_share'])->delete();
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay información de el administrador';
                        }
                    break;
                    default:
                    break;
                }
            break;
        }
        print(json_encode($result));
    }
    else{
        exit('Petición HTTP no definida, acción no definida');
    }

?>