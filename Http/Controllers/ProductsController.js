$(document).ready(function () {
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip(); 
    callProducts();
    $('.modal').modal();
});
function setProducts(products){
    let content='';
    if(products.length>0){
        products.forEach(function(product){
            content+=`
                <div class="col s12 m4">
                    <div class="card z-depth-4" id="Card">
                        <div class="card-content">
                            <div class="row">
                                <a class="right tooltipped" data-position="bottom" data-tooltip="Eliminar" id="InfoProduct"> <i class="material-icons">delete</i> </a>
                                <a onClick="getInformationEdit(${product.id})" class="right tooltipped modal-trigger" href="#EditModalProduct" data-position="left" data-tooltip="Información" id="InfoProduct"> <i class="material-icons">info</i> </a>
                            </div>
                            <span class="card-title">${product.nameProduct}</span>
                            <span class="grey-text">Cantidad: <span class="card-title">${product.count}</span>  </span>
                        </div>
                    </div>
                </div>
            `;
        })
    }
    $('#ProductsRead').html(content);   
}
function callProducts(){
    $.ajax({
        url:requestGET('Products','AllList'),
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
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
    })
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
            data:$('#FormAddProduct').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                console.log(response);
                const result = JSON.parse(response);
                if(result.status){
                    M.toast({html:'¡Agregado correctamente!'});
                    callProducts();
                    $('#AddProductModal').modal('close');
                    $('#FormAddProduct')[0].reset();
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
    .done(function(response
    )
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    var date = moment(result.dataset.date);
                    $('#EditId').val(result.dataset.id);
                    $('#userResponsable').text("Ingresado por: "+result.dataset.name +" "+result.dataset.lastname);
                    $('#dateProduct').text("Fecha de ingreso: "+ date.lang('es').format('dddd D MMMM , YYYY'));
                    $('#EditNameProduct').val(result.dataset.nameProduct);
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
            data:$('#FormEditProduct').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {   
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    ToastSucces('Actualizado Correctamente');
                    ClearForm('FormEditProduct');
                    closeModal('EditModalProduct');
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
})