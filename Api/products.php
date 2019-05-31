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
                    case 'getProducts':
                        if($result['dataset']=Select::all()->from('products')->getAll()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='';
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