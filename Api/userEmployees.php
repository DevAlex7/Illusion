<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validator.php');
    require_once('../Backend/Models/Employees.php');
    require_once('../Helpers/select.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        
        session_start();
        $result=array('status'=>0,'exception'=>'');
        $employe = new Employee(); 
        $select = new Select();
        
        switch($_GET['request']){
            
            case 'GET':
                switch($_GET['action']){
                    case 'getmyProfile':
                        if($employe->id($_SESSION['idUser'])){
                            if($result['dataset'] = $employe->findbyId()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No se ha encontrado información';
                            }
                        }
                        else{
                            $result['exception']='No se ha identificado al usuario logueado';
                        }
                    break;
                    case 'allEmployees':
                       if($employe->id($_SESSION['idUser'])){
                            if($result['dataset']=$employe->all()){
                                $result['status']=1;
                            }   
                            else{
                                $result['exception']='No hay empleados disponibles';
                            }
                       }
                       else{
                        $result['exception']='No hay información';
                       }
                    break;
                    case 'ListEmployees':
                        if($employe->id($_SESSION['idUser'])){
                            if($result['dataset']=$employe->ListPersons()){
                                $result['status']=1;
                            }   
                            else{
                                $result['exception']='No hay empleados disponibles';
                            }
                        }
                        else{
                            $result['exception']='No hay información';
                        }
                    break;
                }
            break;
            
            case 'POST':
                switch($_GET['action']){
                    case 'searchEmployee':
                        if($result['dataset']=$employe->search($_POST['search'])){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No se encontraron resultados';
                        }
                    break;
                    case 'CreateUser':
                        if($employe->name($_POST['NameUser'])){
                            if($employe->lastname($_POST['LastName'])){
                                if($employe->email($_POST['EmailUser'])){
                                    if($employe->username($_POST['Nickname'])){
                                        if( $_POST['pass'] == $_POST['pass2'] ){
                                            if($employe->password($_POST['pass'])){
                                                if($employe->role(1)){
                                                    if(!$select->emailWhere("employees", $_POST['EmailUser'] )){
                                                        $employe->save();
                                                        $result['status']=1;
                                                    }
                                                    else{
                                                        $result['exception']='Correo existente';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='Cargo invalido';
                                                }
                                            }
                                            else{
                                                $result['exception']='La contraseña debe constar al menos de 8 carácteres';
                                            }
                                        }
                                        else{
                                            $result['exception']='Las contraseñas ingresadas no son iguales';
                                        }
                                    }
                                    else{
                                        $result['exception']='El nombre de usuario debe constar de 7 carácteres';
                                    }
                                }
                                else{
                                    $result['exception']='Correo invalido';
                                }
                            }
                            else{
                                $result['exception']='Apellido incorrecto debe llevar al menos 5 carácteres';
                            }
                        }
                        else{
                            $result['exception']='Nombre incorrecto debe llevar al menos 5 carácteres';
                        }
                    break;
                    case 'Login':
                    if($employe->username($_POST['Nickname'])){
                        if($employe->checkUsername()){
                            if($employe->password($_POST['pass'])){
                                if($employe->checkPassword()){
                                    if($employe->getRole() == 0){

                                        $_SESSION['idUser']=$employe->getId();
                                        $_SESSION['NameUser']=$employe->getName();
                                        $_SESSION['LastnameUser']=$employe->getLastname();
                                        $_SESSION['UsernameActive']=$employe->getUsername();
                                        $_SESSION['Role']=$employe->getRole();
                                        $_SESSION['sessionTime'] = time();
                                        $result['status']=1;
                                        $result['site']='../private/home.php';
                                        if($employe->userHasGoogleKey()){
                                            $_SESSION['username_key'] = $_POST['Nickname'];
                                            $_SESSION['keygen'] = $employe->getKey();
                                            $result['status']=1;
                                            $result['site']='verify.php';

                                        }
                                        else{
                                            $employe->openSession();
                                            $result['site']='../private/home.php';
                                            $result['status']=1;    
                                        }   
                                    }
                                    else{
                                        $result['exception']='Usted es un usuario publico';
                                    }
                                }
                                else{
                                    $result['exception']='Contraseña o usuario incorrecto';
                                }
                            }
                            else{
                                $result['exception']='Ingrese la contraseña porfavor, minimo 8 carácteres';
                            }
                        }
                        else{
                            $result['exception']='Usuario inexistente';
                        }
                    }
                    else{
                        $result['exception']='El usuario debe contar con 7 carácteres';
                    }   
                    break;
                    case 'Loginpublic':
                    if($employe->username($_POST['Nickname'])){
                        if($employe->checkUsername()){
                            if($employe->password($_POST['pass'])){
                                if($employe->checkPassword()){
                                    if($employe->getRole() == 2){
                                        $_SESSION['idPublicUser']=$employe->getId();
                                        $_SESSION['publicNameUser']=$employe->getName();
                                        $_SESSION['publicLastnameUser']=$employe->getLastname();
                                        $_SESSION['publicUsernameActive']=$employe->getUsername();
                                        $_SESSION['publicRole']=$employe->getRole();
                                        $result['status']=1;
                                    }
                                    else{
                                        $result['exception']='Usted no es un usuario publico';
                                    }
                                }
                                else{
                                    $result['exception']='Contraseña o usuario incorrecto';
                                }
                            }
                            else{
                                $result['exception']='Ingrese la contraseña porfavor, minimo 8 carácteres';
                            }
                        }
                        else{
                            $result['exception']='Usuario inexistente';
                        }
                    }
                    else{
                        $result['exception']='El usuario debe contar con 7 carácteres';
                    }   
                    break;
                    case 'Logoff':
                        if($employe->logOff()){
                                header('location: /Illusion/private/');
                        }
                        else{
                            header('location: /Illusion/private/home.php');
                            
                        }
                    break;
                    case 'eventsActivity':
                        if($employe->id($_POST['idEmployee'])){
                            if($result['dataset']=$employe->eventsActivity()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay actividad de este usuario en eventos';
                            }
                        }
                        else{
                            $result['exception']='No se ha enviado información del usuario seleccionado';
                        }
                    break;
                    case 'productsActivity':
                        if($employe->id($_POST['idEmployee'])){
                            if($result['dataset']=$employe->productsEventActivity()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay actividad de este usuario en eventos';
                            }
                        }
                        else{
                            $result['exception']='No se ha enviado información del usuario seleccionado';
                        }
                    break;
                    case 'typeEventsActivity':
                        if($employe->id($_POST['idEmployee'])){
                            if($result['dataset']=$employe->getTypeEventUser()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay actividad de este usuario en eventos';
                            }
                        }
                        else{
                            $result['exception']='No se ha enviado información del usuario seleccionado';
                        }
                    break;
                    case 'LogoffPublic':
                        if($employe->LogOffPublic()){
                                header('location: /Illusion/');
                        }
                        else{
                            header('location: /Illusion/user/requests.php');
                            
                        }
                    break;
                    case 'createUserpublic':
                    if($employe->name($_POST['NameUser'])){
                        if($employe->lastname($_POST['LastName'])){
                            if($employe->email($_POST['EmailUser'])){
                                if($employe->username($_POST['Nickname'])){
                                    if( $_POST['pass'] == $_POST['pass2'] ){
                                        if($employe->password($_POST['pass'])){
                                            if($employe->role(2)){
                                                if(!$select->emailWhere("employees", $_POST['EmailUser'] )){
                                                    $employe->save();
                                                    $result['status']=1;
                                                    $result['userInformation']=$_SESSION;
                                                }
                                                else{
                                                    $result['exception']='Correo existente';
                                                }
                                            }
                                            else{
                                                $result['exception']='Cargo invalido';
                                            }
                                        }
                                        else{
                                            $result['exception']='La contraseña debe constar al menos de 8 carácteres';
                                        }
                                    }
                                    else{
                                        $result['exception']='Las contraseñas ingresadas no son iguales';
                                    }
                                }
                                else{
                                    $result['exception']='El nombre de usuario debe constar de 7 carácteres';
                                }
                            }
                            else{
                                $result['exception']='Correo invalido';
                            }
                        }
                        else{
                            $result['exception']='Apellido incorrecto debe llevar al menos 5 carácteres';
                        }
                    }
                    else{
                        $result['exception']='Nombre incorrecto debe llevar al menos 5 carácteres';
                    }
                    break;
                    default:
                    exit('Acción no disponible');
                }
            break;
            
            case 'PUT':
                switch($_GET['action']){
                    case 'updateProfile':
                        if($employe->id($_POST['information']['id'])){
                            if($employe->name($_POST['information']['name'])){
                                if($employe->lastname($_POST['information']['lastname'])){
                                    if($employe->email($_POST['information']['email'])){
                                        if($employe->username($_POST['information']['username'])){
                                            if($employe->editProfile()){
                                                $_SESSION['idUser']=$employe->getId();
                                                $_SESSION['NameUser']=$employe->getName();
                                                $_SESSION['LastnameUser']=$employe->getLastname();
                                                $_SESSION['UsernameActive']=$employe->getUsername();
                                                $result['status']=1;
                                                $result['dataset'] = $employe->findbyId();
                                            }
                                            else{
                                                $result['exception']='No se actualizó';
                                            }
                                        }   
                                        else{
                                            $result['exception']='Campo vacio o usuario con datos erroneos';
                                        }
                                    }
                                    else{
                                        $result['exception']='Campo vacio o dato con mal formato';
                                    }
                                }
                                else{
                                    $result['exception']='Campo vacio o apellido mal ingresados';
                                }
                            }
                            else{
                                $result['exception']='Campo vacio o nombre mal ingresados';
                            }
                        }
                        else{
                            $result['exception']='No se ha logrado identificar el usuario';
                        }
                    break;
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