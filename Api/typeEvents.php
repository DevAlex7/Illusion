<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validator.php');
    require_once('../Helpers/select.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        
        session_start();
        $result=array('status'=>0,'exception'=>'');
        $select = new Select();
        
        switch($_GET['request']){
            
            case 'GET':
                switch($_GET['action']){
                    case 'getTypes':
                        if( $result['dataset']= $select->allFrom('event_types')){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay tipos de eventos registrados';
                        }
                    break;
                }
            break;
            
            case 'POST':
                switch($_GET['action']){
                   
                    default:
                    exit('Acción no disponible');
                }
            break;
            
            case 'PUT':
                switch($_GET['action']){
                    
                }
            break;

            case 'DELETE':
                switch($_GET['action']){
                    case 'DeleteUser':
                    break;
                }
            break;

            default:
            exit('Petición rechazada');
        }
        print( json_encode($result) );
    }
    else{
        exit('Petición de HTTP y acción no definidas');
    }
?>