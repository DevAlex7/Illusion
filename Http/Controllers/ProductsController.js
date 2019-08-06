$(document).ready(function () {
  
    //Iniciar el boton flotante
    $('.fixed-action-btn').floatingActionButton();
    //Iniciar los tooltips
    $('.tooltipped').tooltip(); 
    //Llamar a todos los productos de primera instancia
    callProducts();
    //Iniciar todos los modales
    $('.modal').modal();
});

//Variable global del id del producto, que seleccionemos
var idProduct;
var imageFile;

//Función para rellenar la información en la carta, recibe como parametro el arreglo de dataset
function setProducts(products){
    let content='';
    if(products.length>0){
        products.forEach(function(product){
            content+=`
                <div class="col s12 m4">
                    <div class="card z-depth-4" id="Card">
                        <div class="card-image">
                            <img src="../Imports/resources/pics/products/${product.image_product}">
                            <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <a onClick="getInformationEdit(${product.id})" class="left tooltipped modal-trigger" href="#EditModalProduct" data-position="left" data-tooltip="Información" id="InfoProduct"> <i class="material-icons">info</i> </a>
                                <a onClick="deleteProduct(${product.id},'${product.image_product}')" class="left tooltipped modal-trigger" href="#DeleteProduct" data-position="bottom" data-tooltip="Eliminar" id="InfoProduct"> <i class="material-icons">delete</i> </a>
                            </div>
                            <span class="card-title">${product.nameProduct}</span>
                            <p><a onClick="viewVotes(${product.id})" class="left tooltipped modal-trigger" href="#likesProducts" data-position="bottom" data-tooltip="Eliminar" id="InfoProduct"> Estadísticas </a></p>
                            <span class="grey-text">Cantidad: <span class="card-title"> ${product.count} </span>  </span>
                            
                        </div>
                    </div>
                </div>
            `;
        })
    }
    $('#ProductsRead').html(content);   
}
//Función para llamar a todos los productos
function callProducts(){
    $.ajax(
        {
            /**
             * Utilizamos la funcion requestGET para obtener la dirección de la API, dandole como parametro 
             * @method mandamos el metodo GET para la API
             * @param Nombre de el archivo php de la API
             * @param Nombre de la acción 
             * */ 
            url:requestGET('Products','AllList'),
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(!result.status){
                    M.toast({html:result.exception});
                }
                setProducts(result.dataset);
                $('.tooltipped').tooltip(); 
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
$('#FormAddProduct').submit(function(){
    event.preventDefault();

    $.ajax(
        {
            url:requestPOST('products','SaveProduct'),
            type:'POST',
            data: new FormData($('#FormAddProduct')[0]),
            cache: false,
            contentType: false,
            processData: false,
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status==1){
                    M.toast({html:'¡Agregado correctamente!'});
                    callProducts();
                    $('#AddProductModal').modal('close');
                    $('#FormAddProduct')[0].reset();
                }
                else if(result.status==2){
                    M.toast({html:result.exception});
                }
                else{
                    M.toast({html:'¡Agregado correctamente!'});
                    callProducts();
                    $('#AddProductModal').modal('close');
                    $('#FormAddProduct')[0].reset();
                    M.toast({html:result.exception});
                }
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    
})
function getInformationEdit(product){
    $.ajax(
        {
            url:requestGET('products','GetbyId'),
            type:'POST',
            data:{product},
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    var date = moment(result.dataset.date);
                    $('#EditId').val(result.dataset.id);
                    $('#userResponsable').text("Ingresado por: "+result.dataset.name +" "+result.dataset.lastname);
                    $('#dateProduct').text("Fecha de ingreso: "+ date.lang('es').format('dddd D MMMM , YYYY'));
                    $('#EditNameProduct').val(result.dataset.nameProduct);
                    $('#ImageEditProduct').val(result.dataset.image_product);
                    $('#Image').val(result.dataset.image_product);
                    $('#EditCountProduct').val(result.dataset.count);
                    $('#EditPriceProduct').val(result.dataset.price);
                }
                else{
                    M.toast({html:result.exception});
                }
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

$('#FormEditProduct').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPUT('products','EditProduct'),
            type:'POST',
            data: new FormData($('#FormEditProduct')[0]),
            cache: false,
            contentType: false,
            processData: false,
            datatype:'JSON'
        }
    )
    .done(function(response)
        {   
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status==1){
                    ToastSucces('Actualizado Correctamente');
                    ClearForm('FormEditProduct');
                    closeModal('EditModalProduct');
                    callProducts();
                }
                else if(result.status==2){
                    ToastError(result.exception);
                }
                else if(result.status==3){
                    ToastError("Actulizado sin subir algun archivo");
                    ClearForm('FormEditProduct');
                    closeModal('EditModalProduct');
                    callProducts();
                }
                else{
                    ToastError(result.exception);
                }
            }
            else{
                console.log(response);
            }
        }
    )
     .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

function deleteProduct(product, image){
    idProduct=product;
    imageFile = image;
}
function confirmDelete(){
    $.ajax(
        {
            url:requestDELETE('products','deleteProduct'),
            type:'POST',
            data:{
                idProduct, imageFile
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status==1){
                    ToastSucces('¡Producto eliminado exitosamente!');
                    closeModal('DeleteProduct');
                    callProducts();
                }
                else if(result.status==2){
                    ToastError(result.exception);
                }
                else{
                    ToastError(result.exception);
                }
            }else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Buscar productos
$('#SearchForm').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestGET('products','Search'),
            type:'POST',
            data:$('#SearchForm').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(!result.status){
                    ToastError(result.exception);
                }
                setProducts(result.dataset);
                console.log(result.dataset);
            }   
            else{
                console.log(response);
            } 
        }
    )
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
function viewVotes(id){
    $.ajax(
        {
            url:requestPOST('products','likeStates'),
            type:'POST',
            data:{
                id
            },
            datatype:'JSON'
        }
    )
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                const states = [];
                const likes =[];
                for(i in result.dataset){
                    states.push(result.dataset[i].action);
                    likes.push(result.dataset[i].likes);
                }
                likesStates('likesInformation',likes, states);
            }
            else{
                likesStates('likesInformation',[0], [0]);
            }
        }
        else{

        }
    })
}