<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validates.php');
    require_once('../Backend/Models/Comments_in_event.php');

    if( isset($_GET['request']) && isset($_GET['action'])){
        session_start();
        $result = array('status'=>0,'exception'=>'', 'Count'=>0);
        switch($_GET['request']){
            case 'GET':
                switch($_GET['action']){
                    case 'ListComments':
                        if(Validate::Integer($_POST['idEvent'])->Id()){
                            if($result['dataset']=Comments::set()->id_event($_POST['idEvent'])->getComments()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay comentarios en este evento';
                            }
                        }
                        else{
                            $result['exception']='Fallo al conseguir información del evento.';
                        }
                    break;
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    case 'SaveComment':
                        if(Validate::Integer($_POST['IdEventComment'])->Id()){
                            if(Validate::Integer($_SESSION['idUser'])->Id()){
                                if(Validate::this($_POST['Comment'],3,255)->Alphanumeric()){
                                    Comments::set()->id_event($_POST['IdEventComment'])
                                                    ->id_employee($_SESSION['idUser'])
                                                    ->message($_POST['Comment'])
                                                    ->Insert();
                                    $result['status']=1;
                                }
                                else{
                                    $result['excpetion']='Comentario invalido';
                                }
                            }else{
                                $result['exception']='No hay información del usuario';
                            }
                        }
                        else{
                            $result['exception']='No hay información del evento';
                        }
                    break;
                }
            break;
            case 'PUT':
            break;
            case 'DELETE':
            break;
        }
        print(json_encode($result));
    }
    else{
        exit('Petición HTTP Rechazada y acción');
    }

?>