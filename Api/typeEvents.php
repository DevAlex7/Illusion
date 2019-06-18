<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validator.php');
    require_once('../Helpers/select.php');
    require_once('../Backend/Models/TypeEvents.php');
    require_once('../Helpers/validates.php');
    require_once('../Backend/Models/Binnacle.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        
        session_start();
        $result=array('status'=>0,'exception'=>'','role'=>0);
        $select = new Select();
        $type = new eventTypes();
        
        switch($_GET['request']){
            
            case 'GET':
                switch($_GET['action']){
                    case 'getTypes':
                        if( $result['dataset']= $select->allFrom('event_types')){
                            $result['status']=1;
                            $result['role']=$_SESSION['Role'];
                        }
                        else{
                            $result['exception']='No hay tipos de eventos registrados';
                        }
                    break;
                    case 'getSearch':
                        if($type->valueSearch($_POST['searchType'])){
                            if($result['dataset']=$type->search()){
                                $result['status']=1;
                                $result['role']=$_SESSION['Role'];
                            }
                            else{
                                $result['exception']='No hay resultados';
                            }
                        }
                        else{
                            $result['exception']='Esta vacio :v';
                        }
                    break;
                    case 'getbyId':
                        $typeEvent_info = Select::all()->from('event_types')->where('id',$_POST['idType'])->get();
                        if(!$typeEvent_info==null){
                            if($result['dataset']=$typeEvent_info){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay datos';
                            }
                        }
                        else{
                            $result['exception']='No hay información del tipo de evento seleccionado';
                        }
                    break;
                }
            break;
            
            case 'POST':
                switch($_GET['action']){
                    case 'AddType':
                        if(Validate::this($_POST['NameTypeEvent'], 5, 150)->Alphanumeric()){
                            $type->type($_POST['NameTypeEvent']);
                            Binnacle::set()->action("ha agregado un nuevo tipo de evento: ".$type->getTypeEvent())->user($_SESSION['idUser'])->insert();
                            $type->save();
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Nombre de tipo de evento invalido';
                        }
                    break;
                    default:
                    exit('Acción no disponible');
                }
            break;
            
            case 'PUT':
                switch($_GET['action']){
                    case 'editType':
                        if($type->id($_POST['Id_Type'])){
                            if($type->type($_POST['EditTypeInput'])){
                                $type->edit();
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='Nombre de tipo de evento incorrecto, debe llevar 5 carácteres';
                            }
                        }
                        else{
                            $result['exception']='Tipo de evento no definido';
                        }
                    break;
                    default:
                    exit('acción no definida');
                }
            break;

            case 'DELETE':
                switch($_GET['action']){
                        case 'Deletetype':
                            if($type->id($_POST['idTypeEvent'])){
                                $type->delete();
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay tipo de evento definido';
                            }
                        break;
                    default:
                    exit('acción no definida');
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