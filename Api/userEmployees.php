<?php

require_once('../Backend/Instance/instance.php');
require_once('../Helpers/validator.php');
require_once('../Backend/Models/Employees.php');
require_once('../Helpers/select.php');
require_once('../Helpers/Mails/mail.php');
require_once('../Backend/Models/notifications.php');

if (isset($_GET['request']) && isset($_GET['action'])) {

    session_start();
    $result = array('status' => 0, 'exception' => '');
    $employe = new Employee();
    $select = new Select();
    $mail = new Mail();
    $notification = new Notification();
    switch ($_GET['request']) {

        case 'GET':
            switch ($_GET['action']) {
                case 'getmyProfile':
                    if ($employe->id($_SESSION['idUser'])) {
                        if ($result['dataset'] = $employe->findbyId()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No se ha encontrado información';
                        }
                    } else {
                        $result['exception'] = 'No se ha identificado al usuario logueado';
                    }
                break;
                case 'getRoles':
                    if($result['dataset'] = $employe->getRoles()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay roles';
                    }
                break;
                case 'countUsers':
                if($employe->countUsers()){
                    $result['status']=1;
                }
                else{
                    $result['exception'] = '../private/signup.php';
                }
                break;
                case 'allEmployees':
                    if ($employe->id($_SESSION['idUser'])) {
                        if ($result['dataset'] = $employe->all()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay empleados disponibles';
                        }
                    } else {
                        $result['exception'] = 'No hay información';
                    }
                    break;
                case 'ListEmployees':
                    if ($employe->id($_SESSION['idUser'])) {
                        if ($result['dataset'] = $employe->ListPersons()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay empleados disponibles';
                        }
                    } else {
                        $result['exception'] = 'No hay información';
                    }
                    break;
            }
            break;

        case 'POST':
            switch ($_GET['action']) {
                case 'searchEmployee':
                    if ($result['dataset'] = $employe->search($_POST['search'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No se encontraron resultados';
                    }
                    break;
                case 'CreateUser':
                    if(!$employe->countUsers()){
                        if ($employe->name($_POST['NameUser'])) {
                            if ($employe->lastname($_POST['LastName'])) {
                                if ($employe->email($_POST['EmailUser'])) {
                                    if ($employe->username($_POST['Nickname'])) {
                                        if ($_POST['pass'] == $_POST['pass2']) {
                                            if ($_POST['Nickname'] != $_POST['pass']) {
                                                if ($employe->password($_POST['pass'])) {
                                                    if ($employe->role(0)) {
                                                        if (!$select->emailWhere("employees", $_POST['EmailUser'])) {
                                                            $employe->save();
                                                            $result['status'] = 1;
                                                        } else {
                                                            $result['exception'] = 'Correo existente';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Cargo invalido';
                                                    }
                                                } else {
                                                    $result['exception'] = 'La contraseña debe constar al menos de 8 carácteres';
                                                }
                                            } else {
                                                $result['exception'] = 'La contraseña es igual al nombre de usuario';
                                            }
                                        } else {
                                            $result['exception'] = 'Las contraseñas ingresadas son iguales';
                                        }
                                    } else {
                                        $result['exception'] = 'El nombre de usuario debe constar de 7 carácteres';
                                    }
                                } else {
                                    $result['exception'] = 'Correo invalido';
                                }
                            } else {
                                $result['exception'] = 'Apellido incorrecto debe llevar al menos 5 carácteres';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto debe llevar al menos 5 carácteres';
                        }
                    }
                    else{
                        $result['exception']='Ya hay usuarios en el sistema';
                    }   
                    break;
                case 'Login':
                    if ($employe->username($_POST['Nickname'])) {
                        if ($employe->checkUsername()) {
                            if ($employe->getStatus() != 3 ) {
                                if ($employe->password($_POST['pass'])) {
                                    if ($employe->checkPassword()) {
                                        if ($employe->getStatus() == 1) {
                                            if ($employe->getRole() == 0 || $employe->getRole() == 1) {
                                                if ($employe->verifySetting()) {
                                                    $_SESSION['username_key'] = $_POST['Nickname'];
                                                    $_SESSION['keygen'] = $employe->getKey();
                                                    //$_SESSION['time'] = time();
                                                    $result['status'] = 1;
                                                    $result['site'] = '../private/verify.php';
                                                } else {
                                                    $employe->openSession();
                                                    $result['status'] = 1;
                                                    $result['site'] = '../private/home.php';
                                                }
                                            } else {
                                                $result['exception'] = 'Usted es un usuario publico';
                                            }
                                        } else {
                                            $_SESSION['authUser'] = $employe->getUsername();
                                            $result['status'] = 2;
                                            $result['site'] = '../private/authenticate.php';
                                        }
                                    } else {
                                        $tries = $employe->getTries();
                                        $trie = $tries - 1;
                                        $employe->updateTries($trie);
                                        if ($trie == 0) {
                                            $employe->blockUser();
                                            $notification->sendHelpBlock($_POST['Nickname'], $employe->getId());
                                            $result['exception'] = 'Se ha bloqueado el acceso';
                                        } else {
                                            $result['exception'] = 'Contraseña o usuario incorrecto';
                                        }
                                    }
                                } else {
                                    $result['exception'] = 'Campo vacio o contraseña invalida';
                                }
                            } else {
                                $result['status'] = 3;
                                $result['exception'] = 'Esta cuenta esta suspendida, contacte con el administrador';
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Campo vacio o nombre de usuario invalido';
                    }
                    break;
                    case 'createEmployee':
                        if($employe->name($_POST['name'])){
                            if($employe->lastname($_POST['lastname'])){
                                if($employe->email($_POST['email'])){
                                    if($employe->username($_POST['username'])){
                                        if(!$employe->checkEmail()){                                    
                                            if(!$employe->checkUsername()){
                                                if(strlen($_POST['pass1']) > 7 ){
                                                    if($employe->password($_POST['pass1'])){
                                                        if ($employe->role($_POST['role'])) {
                                                                $employe->save();
                                                                $result['status'] = 1;
                                                        } else {
                                                            $result['exception'] = 'Cargo invalido';
                                                        }   
                                                    }
                                                    else{
                                                        $result['exception']='Contraseña ingresada invalido';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='La contraseña no tiene 8 carácteres';
                                                }
                                            }
                                            else{
                                                $result['exception']='Nombre de usuario existente';
                                            }
                                        }
                                        else{
                                            $result['exception']='Email existente';
                                        }
                                    }
                                    else{
                                        $result['exception']='Nombre de persona invalido';
                                    }
                                }
                                else{
                                    $result['exception']='Correo electronico invalido';
                                }
                            }
                            else{
                                $result['exception']='Apellido de persona invalido';
                            }
                        }
                        else{
                            $result['exception']='Nombre de persona invalido';
                        }
                    break;
                case 'Loginpublic':
                    if ($employe->username($_POST['Nickname'])) {
                        if ($employe->checkUsername()) {
                            if ($employe->password($_POST['pass'])) {
                                if ($employe->checkPassword()) {
                                    if ($employe->getRole() == 2) {
                                        $_SESSION['idPublicUser'] = $employe->getId();
                                        $_SESSION['publicNameUser'] = $employe->getName();
                                        $_SESSION['publicLastnameUser'] = $employe->getLastname();
                                        $_SESSION['publicUsernameActive'] = $employe->getUsername();
                                        $_SESSION['publicRole'] = $employe->getRole();
                                        $result['status'] = 1;
                                    } else {
                                        $result['exception'] = 'Usted no es un usuario publico';
                                    }
                                } else {
                                    $result['exception'] = 'Contraseña o usuario incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Ingrese la contraseña porfavor, minimo 8 carácteres';
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'El usuario debe contar con 7 carácteres';
                    }
                    break;
                case 'Logoff':
                    if ($employe->logOff()) {
                        header('location: /Illusion/private/');
                    } else {
                        header('location: /Illusion/private/home.php');
                    }
                    break;
                case 'eventsActivity':
                    if ($employe->id($_POST['idEmployee'])) {
                        if ($result['dataset'] = $employe->eventsActivity()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay actividad de este usuario en eventos';
                        }
                    } else {
                        $result['exception'] = 'No se ha enviado información del usuario seleccionado';
                    }
                    break;
                case 'productsActivity':
                    if ($employe->id($_POST['idEmployee'])) {
                        if ($result['dataset'] = $employe->productsEventActivity()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay actividad de este usuario en eventos';
                        }
                    } else {
                        $result['exception'] = 'No se ha enviado información del usuario seleccionado';
                    }
                    break;
                case 'typeEventsActivity':
                    if ($employe->id($_POST['idEmployee'])) {
                        if ($result['dataset'] = $employe->getTypeEventUser()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay actividad de este usuario en eventos';
                        }
                    } else {
                        $result['exception'] = 'No se ha enviado información del usuario seleccionado';
                    }
                    break;
                case 'LogoffPublic':
                    if ($employe->LogOffPublic()) {
                        header('location: /Illusion/');
                    } else {
                        header('location: /Illusion/user/requests.php');
                    }
                    break;
                case 'createUserpublic':
                    if ($employe->name($_POST['NameUser'])) {
                        if ($employe->lastname($_POST['LastName'])) {
                            if ($employe->email($_POST['EmailUser'])) {
                                if ($employe->username($_POST['Nickname'])) {
                                    if(!$employe->checkUsername()){
                                        if ($_POST['pass'] == $_POST['pass2']) {
                                            if ($_POST['Nickname'] != $_POST['pass']) {
                                                if ($employe->password($_POST['pass'])) {
                                                    if ($employe->role(2)) {
                                                        if (!$select->emailWhere("employees", $_POST['EmailUser'])) {
                                                            $employe->save();
                                                            $result['status'] = 1;
                                                            $result['userInformation'] = $_SESSION;
                                                        } else {
                                                            $result['exception'] = 'Correo existente';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Cargo invalido';
                                                    }
                                                } else {
                                                    $result['exception'] = 'La contraseña debe constar al menos de 8 carácteres';
                                                }
                                            } else {
                                                $result['exception'] = 'La contraseña es igual al nombre de usuario';
                                            }
                                        } else {
                                            $result['exception'] = 'Las contraseñas ingresadas no son iguales';
                                        }
                                    }
                                    else{
                                        $result['exception']='Este usuario ya existe.';
                                    }
                                } else {
                                    $result['exception'] = 'El nombre de usuario debe constar de 7 carácteres';
                                }
                            } else {
                                $result['exception'] = 'Correo invalido';
                            }
                        } else {
                            $result['exception'] = 'Apellido incorrecto debe llevar al menos 5 carácteres';
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto debe llevar al menos 5 carácteres';
                    }
                    break;
                case 'valid-recover':
                    if ($employe->username($_POST['username'])) {
                        if ($employe->checkUsername()) {
                            $code = rand(1, 1000000);
                            $mail->sendCodeVerification($employe->getEmail(), 'Tu codigo de verificación es: ' . $code);
                            $_SESSION['username_recover'] = $_POST['username'];
                            $_SESSION['code'] = $code;
                            $result['status'] = 1;
                            $result['site'] = '../private/recover.php';
                        } else {
                            $result['exception'] = 'Información erronea';
                        }
                    } else {
                        $result['exception'] = 'Nombre de usuario invalido';
                    }
                    break;
                default:
                    exit('Acción no disponible');
            }
            break;

        case 'PUT':
            switch ($_GET['action']) {
                case 'updateProfile':
                    if ($employe->id($_POST['information']['id'])) {
                        if ($employe->name($_POST['information']['name'])) {
                            if ($employe->lastname($_POST['information']['lastname'])) {
                                if ($employe->email($_POST['information']['email'])) {
                                    if ($employe->username($_POST['information']['username'])) {
                                        if ($employe->editProfile()) {
                                            $_SESSION['idUser'] = $employe->getId();
                                            $_SESSION['NameUser'] = $employe->getName();
                                            $_SESSION['LastnameUser'] = $employe->getLastname();
                                            $_SESSION['UsernameActive'] = $employe->getUsername();
                                            $result['status'] = 1;
                                            $result['dataset'] = $employe->findbyId();
                                        } else {
                                            $result['exception'] = 'No se actualizó';
                                        }
                                    } else {
                                        $result['exception'] = 'Campo vacio o usuario con datos erroneos';
                                    }
                                } else {
                                    $result['exception'] = 'Campo vacio o dato con mal formato';
                                }
                            } else {
                                $result['exception'] = 'Campo vacio o apellido mal ingresados';
                            }
                        } else {
                            $result['exception'] = 'Campo vacio o nombre mal ingresados';
                        }
                    } else {
                        $result['exception'] = 'No se ha logrado identificar el usuario';
                    }
                break;
                case 'restoreUser':
                    if($employe->id($_POST['id'])){
                        if($employe->restoreUser()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No se pudo restablecer el usuario';
                        }
                    }
                    else{
                        $result['exception']='Fallo al restablecer al usuario';
                    }
                break;
                break;
                case 'updatePassword':
                    if ($employe->id($_POST['information']['id'])) {
                        if ($_POST['information']['actpass'] == $_POST['information']['repeatone']) {
                            if ($employe->password($_POST['information']['actpass'])) {
                                if ($employe->checkPassword()) {
                                    if (($_POST['information']['newpass'] == $_POST['information']['repeattwo'])) {
                                        if ($employe->password($_POST['information']['newpass'])) {
                                            if ($employe->resetPassword()) {
                                                $_SESSION['idUser'] = $employe->getId();
                                                $_SESSION['NameUser'] = $employe->getName();
                                                $result['status'] = 1;
                                                $result['dataset'] = $employe->findbyId();
                                            } else {
                                                $result['exception'] = 'No se actualizó';
                                            }
                                        } else {
                                            $result['exception'] = 'Campos vacíos o usuario con datos erroneos';
                                        }
                                    } else {
                                        $result['exception'] = 'Campos vacíos o contraseña actual incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Las contraseñas no coinciden';
                                }
                            } else {
                                $result['exception'] = 'Campos vacíos o contraseña actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Las contraseñas no coinciden';
                        }
                    } else {
                        $result['exception'] = 'No se ha logrado identificar el usuario';
                    }
                    break;
            }
            break;

        case 'DELETE':
            switch ($_GET['action']) {
                case 'DeleteUser':
                    break;
            }
            break;

        default:
            exit('Petición rechazada');
    }
    print(json_encode($result));
} else {
    exit('Petición de HTTP y acción no definidas');
}
