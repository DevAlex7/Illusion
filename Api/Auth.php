<?php 
    
    require_once('../Backend/Instance/instance.php');   
    require_once('../Helpers/validator.php');
    require_once('../Backend/Models/Employees.php');
    require_once('../Helpers/validates.php');
    require_once('../Helpers/GoogleAuthenticator.php');
    require_once('../Helpers/AuthenticatorGenerator.php');
    require_once('../Helpers/Mails/mail.php');
    require_once('../Backend/Models/notifications.php');
if( isset($_GET['request']) && isset($_GET['action']) ){
    $user = new Employee();
    $mail =  new Mail();
    $notification  = new Notification();
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
                                        //$mail->sendEmail( $_SESSION['emailUser'], $_SESSION['UsernameActive'], 'Has iniciado sesión');
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
                    case 'User-Authentication':
                        if($user->username($_SESSION['authUser'])){ 
                            if($user->checkUsername()){
                                if($user->getStatus() == 1 || $user->getStatus() == 2){
                                    if( $_POST['user_verification'] == $_POST['cfuser_verification']){
                                        if($user->password($_POST['user_verification'])){
                                            if($_POST['user_verification'] != $_SESSION['authUser']){
                                                if(!$user->checkPassword()){
                                                    if($user->resetPassword()){
                                                        if($user->token(Authenticator::createSecret())){
                                                            if($user->updateGoogleSecret()){
                                                                $result['status'] = 1;
                                                                $result['site'] ='../private/verification-twosteps.php';
                                                            }
                                                            else{
                                                                $result['exception']='Fallo al asignar token de usuario';
                                                            }
                                                        }
                                                        else{
                                                            $result['exception']='No se pudo autenticar el usuario';
                                                        }
                                                    }
                                                    else{
                                                        $result['exception']='No se pudo restablecer su contraseña';    
                                                    }
                                                }
                                                else{
                                                    $result['exception']='La contraseña tiene que ser diferente a la actual';
                                                }
                                            }
                                            else{
                                                $result['exception']='La contraseña no puede ser igual que el usuario';
                                            }
                                        }
                                        else{
                                            $result['exception']='La contraseña no cumple las expectativas';
                                        }
                                    }
                                    else{
                                        $result['exception']='Las contraseñas son diferentes';
                                    }
                                }
                                else{
                                    $result['exception'] = 'El usuario esta autenticado o desactivado';
                                }
                            }
                            else{
                                $result['exception']='Usuario invalido';
                            }
                        }
                        else{
                            $result['exception']='No se ha encontrado un usuario para autenticar';
                        }
                    break;
                    case 'recover-auth':
                        if($user->token($_POST['code_verification'])){
                            if( $_POST['code_verification'] == $_SESSION['code'] ){
                                $_SESSION['code']='';
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='La verificación es invalido';
                            }   
                        }   
                        else{
                            $result['exception']='Codigo no asignado';
                        }
                    break;
                    case 'recover':
                        if($user->username($_SESSION['username_recover'])){
                            if($user->checkUsername()){
                                if($_POST['pas1'] == $_POST['pas2'] ){
                                    if( $_POST['pas1'] != $user->getUsername() ){
                                        if($user->password($_POST['pas1'])){
                                            if($user->resetPassword()){
                                                $result['status']=1;
                                                $result['site']='../private/';
                                            }
                                            else{
                                                $result['exception']='No se pudo restablecer la contraseña';
                                            }
                                        }
                                        else{
                                            $result['exception']='La contraseña no cumple las expectativas';
                                        }
                                    }
                                    else{
                                        $result['exception']='La contraseña no puede ser igual que el usuario';
                                    }
                                }
                                else{
                                    $result['exception']='Las contraseñas no son iguales';
                                }
                            }
                            else{
                                $result['exception']='Fallo al obtener información';
                            }
                        }
                        else{
                            $result['exception']='Usuario invalido';
                        }
                    break;
                    case 'First-Authentication':
                        if($user->token($_POST['code_verification'])){
                            $auth = new PHPGangsta_GoogleAuthenticator();
                            $code = $auth->getCode($_POST['secret']);
                            $check = $auth->verifyCode($_POST['secret'], $_POST['code_verification'] );
                            if($check){
                                if($user->username($_SESSION['authUser'])){
                                    if($user->checkUsername()){
                                        if($user->Authenticate()){
                                            $_SESSION['authUser'] ='';
                                            $result['status']=1;
                                            $result['site']='../private/';
                                        }
                                        else{
                                            $result['exception']='No se pudo autenticar el usuario';
                                        }    
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
                    case 'Auth-configure':
                        if( $user->id($_SESSION['idUser']) ){
                            if($user->configureTwoSteps($_POST['option'])){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No se pudo configurar tus preferencias';
                            }
                        }
                        else{
                            $result['exception']='Fallo al identificar la configuración';
                        }
                    break;
                    case 'verify-TwoSteps':
                        if( $user->id($_SESSION['idUser']) ){
                            if( $user->verifySetting() ){
                                $result['status']=1;
                            }
                            else{
                                $result['status']=2;
                            }
                        }
                        else{
                            $result['exception']='Fallo al identificar la configuración';
                        }
                    break;
                    case 'notifications-block':
                        if($result['dataset'] = $notification->getBlocks()){
                            $result['status']  = 1;
                        }
                        else{
                            $result['exception']='No hay usuarios bloqueados';
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