$(document).ready(function () {
    exist();
    getInformation();
    $('.tooltipped').tooltip();
    $('.modal').modal();
    getProducts();
    
});
function setCheck(id){
    console.log(id);
}
var idEvent;
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
                <td>${row.count}</td>
                <td>
                    <a class="btn green" onclick="add(${row.id})"><i class="material-icons"> add </i></a>
                    <a class="btn red"><i class="material-icons"> remove </i></a>
                </td>
                <td>
                <a class="btn red"> <i class="material-icons"> delete </i></a>
                </td>
            </tr>
            `;
        })
    }
    $('#ProductsinList').html(content);
}
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
                    <input type="checkbox" onclick="setCheck(${row.id})"/>
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
        data:null,
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
        url:requestGET('events'),
        type:'POST',
        data:{
            idEvent,product_id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
               console.log(response);
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
