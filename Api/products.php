<?php 

    require_once('../Backend/Instance/instance.php');
    require_once('../Helpers/validator.php');
    require_once('../Helpers/select.php');
    require_once('../Backend/Models/Events.php');
    require_once('../Backend/Models/Products.php');
    if( isset($_GET['request']) && isset($_GET['action']) ){
        
        session_start();
        $result = array('status'=>0,'exception'=>'');
        $select = new Select();
        $event = new Events();
        $product = new Product();

        switch($_GET['request'])
        {
            case 'GET':
                switch($_GET['action']){

                    //This action is for events
                    case 'getProducts':
                        if($event->id($_POST['idEvent'])){
                            if($result['dataset']=$event->allProductsinNotList()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay productos disponibles';
                            }
                        }
                        else{
                            $result['exception']='Evento no identificado';
                        }
                    break;
                    case 'AllList':
                    if($result['dataset']=$select->allFrom('products')){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay productos registrados';
                    }
                    break;
                    case 'GetbyId':
                        if($product->id($_POST['product'])){
                            
                            if($result['dataset']=$product->find()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No se encontro información';
                            }

                        }
                        else{
                            $result['exception']='Producto no identificado';
                        }   
                    break;

                    default:
                    exit('acción no disponible');
                }
            break;
            case 'POST':
                switch($_GET['action']){
                    case 'SaveProduct':
                        if($product->nameProduct($_POST['NameProduct'])){
                            if($product->count($_POST['CountStock'])){
                                if($product->id_employee($_SESSION['idUser'])){
                                    if($product->price($_POST['PriceProduct'])){
                                        $product->save();
                                        $result['status']=1;
                                    }
                                    else{
                                        $result['exception']='Dato de precio invalido';
                                    }
                                }
                                else{
                                    $result['exception']='Empleado no definido';
                                }
                            }
                            else{
                                $result['exception']='Cantidad invalida';
                            }
                        }
                        else{
                            $result['exception']='Nombre de producto incorrecto';
                        }
                    break;
                    default: 
                    exit('acción no disponible');
                }
            break;
            case 'PUT':
                switch($_GET['action']){
                    case 'EditProduct':
                        if($product->id($_POST['EditId'])){
                            if($product->nameProduct($_POST['EditNameProduct'])){
                                if($product->count($_POST['EditCountProduct'])){
                                    if($product->price($_POST['EditPriceProduct'])){
                                        
                                        $product->edit();
                                        $result['status']=1;
                                    }
                                    else{
                                        $result['exception']='Precio invalido';
                                    }
                                }
                                else{
                                    $result['exception']='Cantidad invalida';
                                }
                            }
                            else{
                                $result['exception']='Nombre de producto incorrecto';
                            }
                        }
                        else{
                            $result['exception']='No hay información del producto';
                        }
                    break;
                }
            break;
            case 'DELETE':
            
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