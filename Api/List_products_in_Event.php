<?php

require_once('../Backend/Instance/instance.php');
require_once('../Helpers/validator.php');
require_once('../Helpers/select.php');
require_once('../Backend/Models/Products.php');
require_once('../Backend/Models/List_products_in_Event.php');
require_once('../Backend/Models/Events.php');
require_once('../Helpers/Statics.php');


if (isset($_GET['request']) && isset($_GET['action'])) {
    session_start();
    $result = array('status' => 0, 'exception' => '','price'=>0);
    $static = new Static_Helpers();
    $list = new List_products_in_Event();
    $event = new Events();
    $product = new Product();

    switch ($_GET['request']) {
        case 'GET':
            switch ($_GET['action']) {
                case 'getCount':
                if ($list->id_event($_POST['idEvent'])) {
                    if ($list->id_product($_POST['id_product'])) {
                        if ($result['dataset'] = $list->getCount()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No se pudo obtener información';
                        }
                    } else {
                        $result['exception'] = 'No hay información del producto';
                    }
                } else {
                    $result['exception'] = 'No hay información del evento';
                }
                break;
            }
        break;
        case 'POST':
            switch ($_GET['action']) {
                case 'insertProductinList':
                    if ($list->id_product($_POST['product_id'])) {
                        if ($list->count(0)) {
                            if ($list->id_event($_POST['idEvent'])) {
                                if (!$list->exist()) {
                                    $list->save();
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'Producto existente en este evento';
                                }
                            } else {
                                $result['exception'] = 'Evento no identificado';
                            }
                        } else {
                            $result['exception'] = 'Cantidad de producto invalido';
                        }
                    } else {
                        $result['exception'] = 'Producto no añadido correctamente';
                    }
                break;
            }
        break;
        case 'PUT':
            switch($_GET['action']){
                case 'AgregateCountinList':
                if ($list->id($_POST['id_list'])) {
                    if ($list->id_event($_POST['idEvent'])) {
                        if ($list->id_product($_POST['id_product'])) {
                            
                            $cantidadLista = $list->getCount();
                            $cantidadLista = $cantidadLista['count'];
                            

                            if ($product->id($_POST['id_product'])) {
                                $cantidadStock = $product->find();
                                $priceProduct = $product->find();

                                $cantidadStock =  (int)$cantidadStock['count'];
                                $priceProduct =  (float)$priceProduct['price'];

                                if ($list->count($cantidadLista + 1)) {
                                    $list->updateCount();
        
                                    if ($cantidadStock <= 0) {
                                        $result['exception'] = 'No hay stock';
                                    } 
                                    else {
                                        if ($product->count($cantidadStock - 1)) {
                                            
                                            $product->editCount();
                                            $result['status']=1;
                                        }
                                        else{
                                            $result['exception']='Cantidad no definida de producto';
                                        }
                                    }
                                }
                                else{
                                    $result['exception']='Cantidad invalida';
                                }
                            }
                            else{
                                $result['exception']='producto no definido';
                            }
                        }
                        else{
                            $result['exception']='Producto no definido';
                        }
                    }
                    else{
                        $result['exception']='Evento no definido';
                    }
                }
                else{
                    $result['exception']='Lista no encontrada';
                }
            break;
            case 'RestList':
            if ($list->id($_POST['id_list'])) {
                if ($list->id_event($_POST['idEvent'])) {
                    if ($list->id_product($_POST['id_product'])) {
                        
                        $cantidadLista = $list->getCount();
                        $cantidadLista = $cantidadLista['count'];
                        

                        if ($product->id($_POST['id_product'])) {
                            $cantidadStock = $product->find();
                            $priceProduct = $product->find();
                            $cantidadStock =  (int)$cantidadStock['count'];
                            $priceProduct =  (float)$priceProduct['price'];

                            
                            if ($list->count($cantidadLista - 1)) {
                                $list->updateCount();
    
                                if ($cantidadStock <= 0) {
                                    $result['exception'] = 'No hay stock';
                                } 
                                else {
                                    if ($product->count($cantidadStock + 1)) {
                                        
                                        $product->editCount();
                                        $result['status']=1;                                        
                                    }
                                    else{
                                        $result['exception']='Cantidad no definida de producto';
                                    }
                                }
                            }
                            else{
                                $result['exception']='Cantidad invalida';
                            }
                        }
                        else{
                            $result['exception']='producto no definido';
                        }
                    }
                    else{
                        $result['exception']='Producto no definido';
                    }
                }
                else{
                    $result['exception']='Evento no definido';
                }
            }
            else{
                $result['exception']='Lista no encontrada';
            }
            break;
            }
        break;
        case 'DELETE':
            switch($_GET['action']){
                case 'deleteListbyId':
                    if($list->id($_POST['idList'])){
                        if($product->id($_POST['idProduct'])){

                            $listInfo = Select::all()->from('list_products_event')->where('id', $_POST['idList'])->get();
                            $productInfo = Select::all()->from('products')->where('id', $_POST['idProduct'])->get();
                            
                            $stockProducts=$productInfo['count'] + $listInfo['count'];

                            if($product->count($stockProducts)){
                                $list->delete();
                                $product->editCount();
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='Cantidad invalida';
                            }
                        }
                        else{
                            $result['exception']='Producto no definido';
                        }
                    }
                    else{
                        $result['exception']='Lista no definida';
                    }
                break;
                default:
                exit('acción no definida');
            }
        break;
        default:
            exit('Petición rechazada');
    }
    print(json_encode($result));
} else {
    exit('petición HTTP no definida y acción');
}
