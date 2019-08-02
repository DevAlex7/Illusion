$(document).ready(function () {
    callEvents();
});
function getProducts(id){
    $.ajax({
        url:requestPOST('List_products_in_Event','getProductperEvent'),
        type:'POST',
        data:{
            idEvent : id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                //arreglo para guardar los productos
                var products = [];
                //Arreglo para guardar las cantidades
                var countProducts =[];

                for(i in result.dataset){
                    products.push(result.dataset[i].nameProduct);
                    countProducts.push(result.dataset[i].count);
                    productPerEvent(result.dataset[i].id, products, countProducts);
                }
            }else{
                ToastError(result.exception);
            }
        }
        else{
            console.log(response);
        }
    })
}
function setEvents(rows){
    let content ='';
    if(rows.length>0){
        rows.forEach(function(row){
                content+=`
                <div class="col s12 m6">
                    <div class="card" id="Card-${row.id}">
                        <div class="card-content">
                            <span class="card-title white-text">${row.name_event}</span>
                            <div class="divider"></div>
                            <canvas id="Canvas-${row.id}"></canvas>
                        </div>
                    </div>
                </div>
                `;
                getProducts(row.id);
        })
    }
    $('#eventRead').html(content);
}
function callEvents(){
    $.ajax(
        {
            url:requestGET('List_products_in_Event','eventHasProduct'),
            type:'POST',
            data:null,
            datatype:'JSON'
        }  
    )
    .done(
        function(response){
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    setEvents(result.dataset);
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
}
