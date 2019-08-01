<?php 
if (isset($_SERVER['HTTP_ORIGIN'])) {  
    header('Access-Control-Allow-Origin: *');   
    header('Access-Control-Allow-Credentials: true');  
    header('Access-Control-Max-Age: 86400');   
}  

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {  

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))  
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))  
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");  
}

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validator.php');
    require_once('../Backend/Models/Votes_products.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        
        session_start();
        $result = array('status'=>0,'exception'=>'');
        $vote = new Votes_product();
        switch($_GET['request'])
        {
            case 'GET':
                switch($_GET['action']){
                    default:
                    exit('acción no disponible');
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    case 'verify':
                        if($vote->id_user($_POST['idUser'])){   
                            if($vote->id_product($_POST['idProduct'])){
                                if(!$vote->exist()){
                                    
                                }
                                else{
                                    $vote->save();
                                    $result['status']=1;
                                }
                            }
                            else{
                                $result['exception']='No hay información de producto';    
                            }
                        }
                        else{
                            $result['exception']='No hay información de usuario';
                        }
                    break;
                    default: 
                    exit('acción no disponible');
                }
            break;
            case 'PUT':
                switch($_GET['action']){
                  default: 
                    exit('acción no disponible');  
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