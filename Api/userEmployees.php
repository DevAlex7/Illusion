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
                                    $_SESSION['idUser']=$employe->getId();
                                    $_SESSION['NameUser']=$employe->getName();
                                    $_SESSION['LastnameUser']=$employe->getLastname();
                                    $_SESSION['UsernameActive']=$employe->getUsername();
                                    $_SESSION['Role']=$employe->getRole();
                                    $result['status']=1;
                                    $result['site']='../private/home.php';
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