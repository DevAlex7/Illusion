<?php 
 require_once('../Backend/Instance/instance.php');
 require_once('../Backend/Models/Binnacle.php');
 require_once('../Helpers/validates.php');

if( isset($_GET['request']) && isset($_GET['action']) ){
    
    session_start();
    $result = array('status'=>0, 'exception'=>'');

        switch($_GET['request'])
        {
            case 'GET':
                switch($_GET['action']){
                    case 'getBinnacle':
                        if($result['dataset']=Binnacle::getBinnacle()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay acciones';
                        }
                    break;
                default:
                exit('acción no disponible');
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    
                default: 
                exit('acción no disponible');
                }
            break;
            case 'PUT':
                switch($_GET['action']){
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