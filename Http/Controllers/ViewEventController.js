$(document).ready(function () {
    exist();
    getInformation();
    $('.tooltipped').tooltip();
    $('.modal').modal();
    getProducts();
    showPrice();
});
var idList;
var idEvent;
var idProduct;

function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
function exist(){
    if(getQueryVariable("event")){
        idEvent=getQueryVariable("event");
        $.ajax({
            url:requestGET('events','getId'),
            type:'POST',
            data:{
                idEvent
            },
            datatype:'JSON'
        })
        .done(function(response){
            if(isJSONString(response)){
                const result=JSON.parse(response);
                if(result.status){
                }
                else{
                    $(location).attr('href',result.exception);
                }
            }
            else{
                console.log(response);
            }
        })
        .fail(function(jqXHR){
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
    }
    else{
        $(location).attr('href','events.php');
    }
}
//Get all information from the event
function getInformation(){
    $.ajax({
        url:requestGET('events','getallbyId'),
        type:'POST',
        data:{idEvent},
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#TitleEvent').text("Evento: "+result.dataset.name_event);
                $('#TypeEvent').text(result.dataset.type)
                $('#ClientName').text("Cliente: "+result.dataset.client_name);
                $('#DateEvent').text("Fecha: "+result.dataset.date);
                $('#NameCreator').text("Encargado: "+result.dataset.name +' '+result.dataset.lastname);
                $('#StatusEvent').text("Estado del evento: "+result.dataset.status);
                $('#mapEvent').html(result.dataset.place);
            }
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function setProducts(rows){
    let content='';
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`
            <tr>
                <td>${row.nameProduct}</td>
                <td>${row.price}</td>
                <td>${row.count}</td>
                <td>
                    <a onClick="getCountSum(${row.id})" class="btn green tooltipped" data-position="bottom" data-tooltip="Agregar"><i class="material-icons"> add </i></a>
                    <a onClick="getCountMin(${row.id})"class="btn red tooltipped" data-position="bottom" data-tooltip="Restar"><i class="material-icons"> remove </i></a>
                </td>
                <td>
                    <a onClick="confirm(${row.idProductList},${row.id})" href="#ConfirmDeleteProduct" class="btn red tooltipped modal-trigger" data-position="right" data-tooltip="Eliminar"> <i class="material-icons"> delete </i></a>
                </td>
            </tr>
            `;
        })
    }
    $('#ProductsinList').html(content);
}
//Get products in events
function getProducts(){
    $.ajax({
        url:requestGET('events','getProducts'),
        type:'POST',
        data:{
            idEvent
        },
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
function setListProducts(rows){
    let content='';
    console.log(rows);
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`
                <p>
                    <label>
                        <input type="checkbox" onclick="add(${row.id})"/>
                        <span>${row.nameProduct}</span>
                    </label>
                </p>
            `;
        })
    }
    $('#ListofProducts').html(content);
}
function ListProducts(){
    $.ajax({
        url:requestGET('products','getProducts'),
        type:'POST',
        data:{
            idEvent
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                M.toast({html:result.exception});
            }
            setListProducts(result.dataset);

        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function add(product_id){
    $.ajax({
        url:requestPOST('List_products_in_Event','insertProductinList'),
        type:'POST',
        data:{
            idEvent , product_id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
               M.toast({html:'añadido correctamente'});
               ListProducts();
               getProducts();
            }
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function getCountSum(id_product){
    
    $.ajax({
        url:requestGET('List_products_in_Event','getCount'),
        type:'POST',
        data:{
            idEvent:idEvent,
            id_product:id_product
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result=JSON.parse(response);
            if(result.status){

                var idList=result.dataset.id;
                var count =result.dataset.count;
                SumCount(idList, id_product);
                $('.tooltipped').tooltip();
            }
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function SumCount(id_list, id_product){
    var count = parseInt(1);
    $.ajax({
        url:requestPUT('List_products_in_Event','AgregateCountinList'),
        type:'POST',
        data:{
            count: count,
            id_list:id_list,
            id_product:id_product,
            idEvent:idEvent
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result=JSON.parse(response);
            if(result.status){
                getProducts();
                showPrice();
                $('.tooltipped').tooltip();
            }
            else{
                M.toast({html:result.exception});
            }   
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function getCountMin(id_product){
    $.ajax({
        url:requestGET('List_products_in_Event','getCount'),
        type:'POST',
        data:{
            idEvent:idEvent,
            id_product:id_product
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result=JSON.parse(response);
            if(result.status){

                var idList=result.dataset.id;
                var count =result.dataset.count;
                MinCount(idList, id_product);
                $('.tooltipped').tooltip();
            }
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function MinCount(id_list, id_product){
    $.ajax({
        url:requestPUT('List_products_in_Event','RestList'),
        type:'POST',
        data:{
            id_list:id_list,
            id_product:id_product,
            idEvent:idEvent
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result=JSON.parse(response);
            if(result.status==1){
                showPrice();
                getProducts();
                $('.tooltipped').tooltip();
            }
            else{
                M.toast({html:result.exception});
            }   
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function confirm(id_List,id_Product){
    idList=id_List;
    idProduct = id_Product;
}
function removeFromList(){
    $.ajax({
        url:requestDELETE('List_products_in_Event','deleteListbyId'),
        type:'POST',
        data:{
            idList, idProduct
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Eliminado Correctamente'});
                getProducts();
                showPrice();
                $('.tooltipped').tooltip();
                $('#ConfirmDeleteProduct').modal('close');
            }
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function showPrice(){
    $.ajax({
        url:requestGET('events','getPrice'),
        type:'POST',
        data:{
            idEvent
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status==1){
                $('#PriceEvent').text("Costo evento: $"+result.price);
            }
            else if(result.status==2){
                $('#PriceEvent').text("Costo evento: $"+result.price);
            }
            else{
                M.toast({html:result.exception});
            }
        }    
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}