<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validator.php');
    require_once('../Helpers/select.php');
    require_once('../Backend/Models/List_products_in_Event.php');

    if( isset($_GET['request']) && isset($_GET['action']) ){
        session_start();
        $result = array('status'=>0,'exception'=>'');
        $list = new List_products_in_Event();
        
        switch ($_GET['request']){
            case 'GET':
                switch($_GET['action']){
                    case 'getProductsinEvents':
                    break;
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    case 'insertProductinList':
                        if($list->id_product($_POST['product_id'])){
                            if($list->count(0)){
                                if($list->id_event($_POST['idEvent'])){
                                    if(!$list->exist()){
                                        $list->save();
                                        $result['status']=1;
                                    }
                                    else{
                                        $result['exception']='Producto existente en este evento';
                                    }
                                }
                                else{
                                    $result['exception']='Evento no identificado';
                                }   
                            }
                            else{
                                $result['exception']='Cantidad de producto invalido';
                            }
                        }
                        else{
                            $result['exception']='Producto no añadido correctamente';
                        }
                    break;
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
        exit('petición HTTP no definida y acción');
    }
?>