<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validates.php');

if( isset($_GET['request']) && isset($_GET['action']) ){
    
    session_start();
    $result = array('status'=>0, 'exception'=>'', 'role'=>0, 'id'=>0, 'username'=>'');

        switch($_GET['request'])
        {
            case 'GET':
                switch($_GET['action']){
                    case 'Authentication':
                    if(isset($_SESSION['idUser'])){
                        $result['status']=1;
                        $result['id']=1;
                    }
                    else{
                        $result['exception']=0;
                    }
                    break;
                    default:
                    exit('acción no disponible');
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