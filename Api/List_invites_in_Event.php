<?php

    require_once('../Backend/Instance/instance.php');
    require_once('../Backend/Models/List_invites_in_Event.php');
    require_once('../Helpers/validates.php');
    require_once('../Helpers/select.php');
    
    if( isset($_GET['request']) && isset($_GET['action'])){
        session_start();
        $result = array('status'=>0, 'exception'=>'','role'=>'');
        $invite = new List_Invites();
        switch($_GET['request']){
            case 'GET':
                switch ($_GET['action']) {
                    case 'ListInvites':
                        if(Validate::Integer($_POST['idEvent'])->Id()){
                            if($result['dataset']=List_Invites::set()->id_event($_POST['idEvent'])->listInvites()){
                                $result['status']=1;
                                $result['role']=$_SESSION['Role'];
                            }
                            else{
                                $result['exception']='No hay lista de invitados';
                            }
                        }
                        else{
                            $result['exception']='No hay información del evento';
                        }
                    break;
                    default:
                    exit('Acción no disponible');
                    break;
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    case 'SaveInvite':
                        if(Validate::this($_POST['NameInvite'], 3, 150)->Alphabetic()){
                            if(Validate::this($_POST['LastnameInvite'], 3, 150)->Alphabetic()){
                                if(Validate::Integer($_POST['IdEvent'])->Id()){
                                    List_Invites::set()
                                                ->namePerson($_POST['NameInvite'])
                                                ->lastnamePerson($_POST['LastnameInvite'])
                                                ->id_event($_POST['IdEvent'])
                                                ->Insert();
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception']='Información del evento no definida';
                                }
                            }
                            else{
                                $result['exception']='Mal formato de apellido debe contar con 3 carácteres';
                            }
                        }
                        else{
                            $result['exception']='Mal formato de nombre debe contar al menos con 3 carácteres';
                        }
                    break;
                    default:
                    exit ('Acción rechazada');
                    break;
                }
            break;
            case 'PUT':
            break;
            case 'DELETE':
                switch($_GET['action']){
                    case 'deleteInvite':
                    if( Validate::Integer($_POST['idlistInvite'])->Id() ){
                        List_Invites::set()->id($_POST['idlistInvite'])->delete();
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay información del invitado seleccionado';
                    }
                    break;
                    default:
                        exit('Acción no disponible');
                    break;
                }
            break;
            default:
            exit('Petición rechazada');
            break;
        }
        print(json_encode($result));
    }
    else{
        exit('Petición HTTP no definida y acciones');
    }

?>