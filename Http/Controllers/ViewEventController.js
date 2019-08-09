$(document).ready(function () {
  
    exist();
    getInformation();
    $('.tooltipped').tooltip();
    $('.modal').modal();
    getProducts();
    showPrice();
    getCountCollaborators();
    GetPersonsList();
    $('.fixed-action-btn').floatingActionButton();
    verifyActions();
    ShowComments();
});
//To get the id List of product
var idList;
//To get the id of event
var idEvent;
//To get id product, when we select the product
var idProduct;
//Id de la lista de invitados
var idlistInvite;

//Validate variable in the URL
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
//Validate if value in the variable exits in DB
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
            catchError(jqXHR); 
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
                $('#IdEventComment').val(idEvent);
                $('#TitleEvent').text("Evento: "+result.dataset.name_event);
                $('#TypeEvent').text("Tipo de evento: "+result.dataset.type)
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
        catchError(jqXHR); 
    });
}
//Set information products in the list of products
function setProducts(rows, role){
    let content='';
    if(rows.length>0){
        rows.forEach(function(row){
            if(role==0){
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
            }
            else{
                content+=`
                    <tr>
                        <td>${row.nameProduct}</td>
                        <td>${row.price}</td>
                        <td>${row.count}</td>
                    </tr>
            `;
            }
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
            setProducts(result.dataset, result.role);
            $('.tooltipped').tooltip();
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        catchError(jqXHR); 
    });
}
//Call all products that it doesnt is in the list of the event
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
//Call all products from the list of event
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
        catchError(jqXHR); 
    });
}
//Check the product to add to the list
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
                closeModal('AddProducts');
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        catchError(jqXHR); 
    });
}
//Get the count of product in the list products from the event
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
        catchError(jqXHR); 
    });
}
//Add 1 product to the list of products from the event
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
        catchError(jqXHR); 
    });
}
//Get the count of product in the list from the event to remove count
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
        catchError(jqXHR); 
    });
}
//remove 1 product to the list of products from the event
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
        catchError(jqXHR); 
    });
}
//Confirm in the button delete if delete the product from the list
function confirm(id_List,id_Product){
    idList=id_List;
    idProduct = id_Product;
}

//Remove product from the list
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
        catchError(jqXHR); 
    });
}
//Show the acumulate prices of the products
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
        catchError(jqXHR); 
    });
}
function editNameEvent(){
    $.ajax(
        {
            url:requestGET('events','getallbyId'),
            type:'POST',
            data:{
                idEvent
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    $('#IdEventEdit').val(idEvent);
                    $('#NameEventEdit').val(result.dataset.name_event);
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
        catchError(jqXHR); 
    });   
}

$('#EditEventNameForm').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPUT('events','updateOne'),
            type:'POST',
            data:$('#EditEventNameForm').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status==1){
                    ToastSucces('¡Nombre de evento actualizado!');
                    getInformation();
                    closeModal('ModalEditTitleEvent');
                }
                else if(result.status==2){
                    ToastSucces('¡Nombre de evento actualizado!');
                    getInformation();
                    closeModal('ModalEditTitleEvent');
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
        catchError(jqXHR); 
    }); 
})

function selectTypeEvents(Select, value){
    $.ajax({
        url: requestGET('typeEvents','getTypes'),
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione tipo de evento</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.id != value) {
                        content += `<option value="${row.id}">${row.type}</option>`;
                    } else {
                        content += `<option value="${row.id}" selected>${row.type}</option>`;
                    }
                });
                $('#' + Select).html(content);
            } else {
                $('#' + Select).html('<option value="">No hay tipos de eventos</option>');
            }
            $('select').formSelect();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        catchError(jqXHR); 
    });
}
function InfoEvent(){
    $.ajax(
        {
            url:requestGET('events','getallbyId'),
            type:'POST',
            data:{
                idEvent
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    $('#EditIdEventInfo').val(idEvent);
                    $('#DateEdit').val(result.dataset.date);
                    selectTypeEvents('TypeEventsEdit',result.dataset.type_event); 
                    M.updateTextFields();                   
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
        catchError(jqXHR); 
    });
}
$('#EditInfoForm').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPUT('events','updateInfoEvent'),
            type:'POST',
            data:$('#EditInfoForm').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status==1){
                    ToastSucces('¡Información del evento modificada exitosamente!');
                    closeModal('EditInformationEvent');
                    getInformation();
                }
                else if(result.status==2){
                    ToastSucces('¡Información del evento modificada exitosamente!');
                    closeModal('EditInformationEvent');
                    getInformation();
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
        catchError(jqXHR); 
    });
})

//Call map information
function editMap(){
    $.ajax(
        {
            url:requestGET('events','getallbyId'),
            type:'POST',
            data:{
                idEvent
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {   
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    $('#EditMapId').val(result.dataset.id);
                    $('#EditMap').val(result.dataset.place);
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
        catchError(jqXHR); 
    });
}
//Edit map
$('#MapEditForm').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPUT('events','editMap'),
            type:'POST',
            data:$('#MapEditForm').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    ToastSucces('¡Se ha actualizado el mapa!');
                    closeModal('ModalEditMapEvent');
                    getInformation();
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
        catchError(jqXHR); 
    });
})
function viewReportInvites(){
    window.open('private_reports/invitesEvent.php?idEvent='+idEvent);
}
function setInvites(invites,role){
    let content='';
    if(invites.length>0){
        invites.forEach(function(invite){
            if(role==0){
                content+=`
                    <tr>
                        <td>${invite.namePerson}</td>
                        <td>${invite.lastnamePerson}</td>
                        <td>
                            <a onClick="deletePerson(${invite.id})" href="#DeleteInviteModal" class="btn red tooltipped modal-trigger" data-position="right" data-tooltip="Eliminar"> <i class="material-icons"> delete </i></a>
                        </td>
                    </tr>
                `;
            }
            else{
                content+=`
                    <tr>
                        <td>${invite.namePerson}</td>
                        <td>${invite.lastnamePerson}</td>
                    </tr>
                `;
            }
        })
        $('#buttonPDF').html(`<a class="btn red" href="javascript:viewReportInvites()">Reporte PDF</a>`);
    }
    
    $('#InvitesRead').html(content);
}
function GetPersonsList(){
    $.ajax(
        {
            url:requestGET('List_invites_in_Event','ListInvites'),
            type:'POST',
            data:{idEvent},
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
                setInvites(result.dataset,result.role);
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR); 
    });
}
$('#InvitesForm').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPOST('List_invites_in_Event','SaveInvite'),
            type:'POST',
            data:$('#InvitesForm').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    ToastSucces('¡La persona ha sido agregada exitosamente!');
                    ClearForm('InvitesForm');
                    closeModal('AddInvites');
                    GetPersonsList();
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
        catchError(jqXHR); 
    });
})
function deletePerson(invite_list){
    idlistInvite = invite_list;
}
function deleteInvite(){
    $.ajax(
        {
            url:requestDELETE('List_invites_in_Event','deleteInvite'),
            type:'POST',
            data:{
                idlistInvite
            },
            datatype:'JSON'

        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    ToastSucces('¡Invitado eliminado de la lista satisfactoriamente!');
                    closeModal('DeleteInviteModal');
                    GetPersonsList();
                }
                else{
                    ToastError(result.status);
                }
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR); 
    });
}
function verifyActions(){
    $.ajax(
        {
            url:requestGET('events','verifyActions'),
            type:'POST',
            data:{
                idEvent
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status==1){
                     //Permisos si el usuario creo el evento 
                    $('#EditEventNameBtn').removeClass('disabled');
                    $('#EditInformationBtn').removeClass('disabled');
                    $('#EditMapBtn').removeClass('disabled');
                    $('#AddProductsBtn').removeClass('disabled');
                    $('#BtnAddInvites').removeClass('disabled');
                    $('#SendComment').removeClass('disabled');
                }
                else if(result.status==2){
                     //verifica si el usuario es colaborador del evento
                    $('#EditEventNameBtn').removeClass('disabled');
                    $('#EditInformationBtn').removeClass('disabled');
                    $('#EditMapBtn').removeClass('disabled');
                    $('#AddProductsBtn').removeClass('disabled');
                    $('#BtnAddInvites').removeClass('disabled');
                    $('#SendComment').removeClass('disabled');
                }
                else{
                    //No tiene permisos para nada
                    $('#EditEventNameBtn').addClass('disabled');
                    $('#EditInformationBtn').addClass('disabled');
                    $('#EditMapBtn').addClass('disabled');
                    $('#AddProductsBtn').addClass('disabled');
                    $('#BtnAddInvites').addClass('disabled');
                    $('#collaboratorLink').addClass('disabled');
                    $('#SendComment').addClass('disabled');
                }
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR); 
    });
}
function getCountCollaborators(){
    $.ajax(
        {
            url:requestGET('events','getCountCollaborators'),
            type:'POST',
            data:{
                idEvent
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    $('#collaboratorLink').html(`<i class="material-icons left">link</i>`+result.dataset.Count+" Colaboradores");
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
        catchError(jqXHR);   
    })
}
function setCollaborators(colaborators){
    let content ='';
    if(colaborators.length>0){
        colaborators.forEach(function(colaborator){
            content+=`
            <tr>
                <td>${colaborator.name}</td>
                <td>${colaborator.lastname}</td>
                <td>
                    <a onClick="deleteAdmin(${colaborator.id})" class="btn red tooltipped" data-position="right" data-tooltip="Eliminar"> <i class="material-icons"> delete </i></a>
                </td>
            </tr>
            `;
        })
    }
    $('#ReadCollaborators').html(content);
}
function CallColaborators(){
    $.ajax(
        {
            url:requestGET('Shares_events','getListShares'),
            type:'POST',
            data:{
                idEvent
            },
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
                setCollaborators(result.dataset);
                
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR);
    })
}
function setUsers(users){
    let content='';
    if(users.length>0){
        users.forEach(function(user){
            content+=`
            <p>
                <label>
                    <input type="checkbox" onClick="addCollaborator(${user.id})"/>
                    <span>${user.name}</span>
                </label>
            </p>
            `;
        })
    }
    $('#ReadUsers').html(content);
}
function loadUsers(){
    $.ajax(
        {   
            url:requestGET('events','ListAdmins'),
            type:'POST',
            data:{
                idEvent
            },
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
                setUsers(result.dataset);
                CallColaborators();
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR);
    })
}
function addCollaborator(id_employee){
    $.ajax(
        {
            url:requestPOST('Shares_events','SaveShare'),
            type:'POST',
            data:{
                idEvent, id_employee
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    
                    loadUsers();
                    getCountCollaborators();
                    ToastSucces('¡Administrador agregado al evento satisfactoriamente!');
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
        catchError(jqXHR);
    })
}
function deleteAdmin(id_share){
    $.ajax(
        {   
            url:requestDELETE('Shares_events','deleteShare'),
            type:'POST',
            data:{
                id_share
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response)
                if(result.status){
                    getCountCollaborators();
                    loadUsers();
                    ToastSucces('¡Eliminado!');
                    verifyActions();
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
        catchError(jqXHR);
    })
}
function setMessages(messages, id_user){
    let content='';
    if(messages.length>0){
        messages.forEach(function(message){
            if(message.id==id_user){
                content+=`
                <ul class="collection" id="CollectionComments">
                    <li class="collection-item">
                        <p class="title"> <b>${message.name+" "+message.lastname}</b></p>
                        <div class="white-text" id="ChipComment" style="display: inline-block;">
                        <span id="TitleComment">${message.message}</span>
                        </div>
                        <a href="#ReplyesModal" class="modal-trigger" onClick="getReplyes(${message.idMessage})"> <i class="material-icons" id="IconReply">reply</i> </a>
                        <a class="secondary-content"> <i class="material-icons blue-text modal-trigger" data-target="MessageUser" onClick="EditModalComment()">edit</i> <i class="material-icons red-text modal-trigger" data-target="DeleteMessageUser" onClick="DeleteComment()">delete</i> </a>
                        <div class="right" id="right">
                        <a class="grey-text"> ${message.trendingTotal} respuestas </a>
                        </div>
                    </li>
                </ul>
            `;
            }
            else{
                content+=`
                    <ul class="collection" id="CollectionComments">
                        <li class="collection-item">
                            <p class="title"> <b>${message.name+" "+message.lastname}</b></p>
                            <div class="white-text" id="ChipComment" style="display: inline-block;">
                            <span id="TitleComment">${message.message}</span>
                            </div>
                            <a href="#ReplyesModal" class="modal-trigger"  onClick="getReplyes(${message.idMessage})"> <i class="material-icons" id="IconReply">reply</i> </a>
                            <div class="right" id="right">
                                <a class="grey-text"> ${message.trendingTotal} respuestas </a>
                            </div>
                        </li>
                    </ul>
                `;
            }
        })
    }
    $('#CommentsPart').html(content);
}
function ShowComments(){
    $.ajax(
        {
            url:requestGET('Comments_in_event','ListComments'),
            type:'POST',
            data:{
                idEvent
            },
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
                setMessages(result.dataset, result.User);
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR);
    });

}
$('#FormCommentUser').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPOST('Comments_in_event','SaveComment'),
            type:'POST',
            data:$('#FormCommentUser').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    ToastSucces('Comentario agregado correctamente!');
                    ShowComments();
                    $('#Comment').val('');
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
        catchError(jqXHR);
    })
})
function setReplys(replys, id_user){
    let content= '';
    if(replys.length>0){
        replys.forEach(function(reply){
            if(reply.id==id_user){
                content+=`
                <ul class="collection" id="CollectionComments">
                    <li class="collection-item">
                        <p class="title"> <b>${reply.name+" "+reply.lastname}</b></p>
                        <div class="white-text" id="ChipComment" style="display: inline-block;">
                        <span id="TitleComment">${reply.message}</span>
                        </div>
                        <a class="secondary-content"> <i class="material-icons blue-text modal-trigger" data-target="MessageUser" onClick="EditModalComment()">edit</i> <i class="material-icons red-text modal-trigger" data-target="DeleteMessageUser" onClick="DeleteComment()">delete</i> </a>
                        <div class="right" id="right">
                        </div>
                    </li>
                </ul>
            `;
            }
            else{
                content+=`
                    <ul class="collection" id="CollectionComments">
                        <li class="collection-item">
                            <p class="title"> <b>${reply.name+" "+reply.lastname}</b></p>
                            <div class="white-text" id="ChipComment" style="display: inline-block;">
                            <span id="TitleComment">${reply.message}</span>
                            </div>
                            <div class="right" id="right">
                            </div>
                        </li>
                    </ul>
                `;
            }
        })
    }
    $('#ReplyesPart').html(content);
    
}
var idComment;
function getReplyes(id_comment){
    $('#IdComment').val(id_comment);
    idComment=id_comment;
    $.ajax(
        {
            url:requestGET('Comments_in_event','ListReplies'),
            type:'POST',
            data:{
                id_comment
            },
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
                setReplys(result.dataset, result.User);
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR);
    })
}
$('#FormReplytUser').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPOST('Comments_in_event','SaveReply'),
            type:'POST',
            data:$('#FormReplytUser').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    ToastSucces('¡Respondiste al comentario!');
                    getReplyes(idComment);
                    ShowComments();
                    $('#CommentReply').val('');
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
        catchError(jqXHR);
    })

})
