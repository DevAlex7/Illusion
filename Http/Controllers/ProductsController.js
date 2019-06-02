$(document).ready(function () {
    $('.modal').modal();
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip(); 
    callProducts();
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
                                <a href="" class="right tooltipped" data-position="bottom" data-tooltip="Eliminar" id="InfoProduct"> <i class="material-icons">delete</i> </a>
                                <a href="" class="right tooltipped" data-position="left" data-tooltip="Información" id="InfoProduct"> <i class="material-icons">info</i> </a>
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