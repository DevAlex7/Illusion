<?php 

    require_once('../Backend/Instance/instance.php');   
    require_once('../Helpers/validator.php');
    require_once('../Backend/Models/Employees.php');
    require_once('../Helpers/validates.php');
    require_once('../Helpers/GoogleAuthenticator.php');
if( isset($_GET['request']) && isset($_GET['action']) ){
    $user = new Employee();
    session_start();
    $result = array('status'=>0, 'exception'=>'', 'role'=>0, 'id'=>0, 'username'=>'');

        switch($_GET['request'])
        {
            case 'POST':
                switch($_GET['action']){
                    case 'setVerification':
                        if($user->token($_POST['token'])){
                            if($user->id($_SESSION['idUser'])){
                                if($user->updateGoogleSecret()){
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception']='No pudo configurar la verificación de dos pasos';
                                }
                            }
                            else{
                                $result['exception']='Falló al reconocer al usuario';
                            }
                        }
                        else{
                            $result['exception']='Codigo invalido para verificar';
                        }
                    break;
                    case 'Login-Authentication':
                    
                        if($user->token($_POST['code_verification'])){
                            $auth = new PHPGangsta_GoogleAuthenticator();
                            $code = $auth->getCode($_SESSION['keygen']);
                            $check = $auth->verifyCode($_SESSION['keygen'], $_POST['code_verification'] );
                            if($check){
                                if($user->username($_SESSION['username_key'])){
                                    if($user->checkUsername()){
                                        $user->openSession();
                                        $result['status']=1;
                                        $result['site']='../private/home.php';                                       
                                    }
                                    else{
                                        $result['exception']='No se ha obtenido información';
                                    }
                                }
                                else{
                                    $result['exception']='No se ha identificado al usuario';
                                }
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='Codigo no valido';
                            }
                        }   
                        else{
                            $result['exception']='Codigo no asignado';
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