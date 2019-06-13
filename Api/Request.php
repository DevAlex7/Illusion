<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Backend/Models/Request.php');
    require_once('../Helpers/validates.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        
        session_start();
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
                    case 'sendRequest':
                        if(Validate::this($_POST['first_name'],2,150)->Alphabetic()){
                            if(Validate::this($_POST['last_name'], 2, 150)->Alphabetic()){
                                if(Validate::type($_POST['e_mail'])->Email()){
                                    if(Validate::date($_POST['date_event'])->afterToday()){
                                        if( Validate::Integer($_POST['phone'])->Id() && Validate::Integer($_POST['phone2'])->Id() ){
                                            if(Request::set()->phone_number($_POST['phone'],$_POST['phone2'])){
                                                if(Validate::Integer($_POST['TIpoeventos'])->Id()){
                                                    if(Validate::this($_POST['description'],2,300)->Alphabetic()){
                                                        Request::set()
                                                                    ->name_client($_POST['first_name'])
                                                                    ->last_name($_POST['last_name'])
                                                                    ->email($_POST['e_mail'])
                                                                    ->date_event($_POST['date_event'])
                                                                    ->phone_number($_POST['phone'],$_POST['phone2'])
                                                                    ->type_event($_POST['TIpoeventos'])
                                                                    ->description_event($_POST['description'])
                                                                    ->status()
                                                                    ->Insert();
                                                        $result['status']=1;
                                                    }else{
                                                        $result['exception']='Descripción incorrecta';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='No se ha seleccionado ningun tipo de evento';
                                                }
                                            }
                                            else{
                                                $result['exception']='Los numeros telefonicos tienen que ser menos a 5 digitos';
                                            }
                                        }
                                        else{
                                            $result['exception']='Los campos telefonicos no cumplen las expectativas';
                                        }
                                    }
                                    else{
                                        $result['exception']='No podemos agregar evento con fechas pasadas o no cumple el formato, lo sentimos';
                                    }
                                }
                                else{
                                    $result['exception']='Formato de email incorrecto';
                                }
                            }
                            else{
                                $result['exception']='Apellido incorrecto';     
                            }
                        }
                        else{
                            $result['exception']='Nombre invalido';
                        }
                    break;
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