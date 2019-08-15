$(document).ready(function () {
   
    callTypes();
    $('.modal').modal();
});
//Global variables 
var idTypeEvent;
//Set the information of types in cards 
function setTypes(types,role){
    let content='';
    if(types.length>0){
        types.forEach(function(type){
            if(role==0){
                content+=
                `
                <div class="col s12 m12">
                    <blockquote>
                        <div class="card-panel">
                            <div class="right">
                                <a onClick="showtoEdit(${type.id})" class="tooltipped modal-trigger" href="#ModalEditType" data-position="left" data-tooltip="Editar" id="editPart"> <i class="material-icons">edit</i> </a>
                                <a onClick="showtoDelete(${type.id})" class="red-text tooltipped modal-trigger" href="#ModalDeleteType" data-position="top" data-tooltip="Eliminar"> <i class="material-icons">delete</i> </a>
                            </div>
                            <p>${type.type}</p>
                        </div>
                    </blockquote>
                </div>
                `;
            }
            else{
                content+=
                `
                <div class="col s12 m12">
                    <blockquote>
                        <div class="card-panel">
                            <p>${type.type}</p>
                        </div>
                    </blockquote>
                </div>
                `;
            }
        })
    }
    else{

    }
    $('#TypesRead').html(content);
}

//Call all type of events
function callTypes(){
    $.ajax({
        url:requestGET('typeEvents','getTypes'),
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
            }
            setTypes(result.dataset,result.role);
            
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

//Add type event
$('#FormAddType').submit(function(){
    event.preventDefault();
    $.ajax({
        url:requestPOST('typeEvents','AddType'),
        type:'POST',
        data: $('#FormAddType').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'¡Tipo de evento añadido!'});
                $('#FormAddType')[0].reset();
                callTypes();
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
})

//Search type of event
$('#FormSearch').submit(function(){
    event.preventDefault();
    $.ajax({
        url: requestGET('typeEvents','getSearch'),
        type:'POST',
        data: $('#FormSearch').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            console.log(response);
            const result = JSON.parse(response);
            if(!result.status){
            }
            setTypes(result.dataset, result.role);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

//clear the search box
function clearSearch(){
    $('#searchType').val('');
    callTypes();
}

//Show information to edit
function showtoEdit(idType){
    idTypeEvent=idType;
    $.ajax({
        url:requestGET('typeEvents','getbyId'),
        type:'POST',
        data:{
            idType
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#Id_Type').val(result.dataset.id);
                $('#EditTypeInput').val(result.dataset.type);
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
//Edit type
$('#EditFormType').submit(function(){
   
    event.preventDefault();
    $.ajax({
        url:requestPUT('typeEvents','editType'),
        type:'POST',
        data:$('#EditFormType').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'¡Nombre de tipo de evento actualizado correctamente!'});
                $('#ModalEditType').modal('close');
                $('#EditFormType')[0].reset();
                callTypes();
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
})
//Show information to delete
function showtoDelete(idType){
    $.ajax({
        url:requestGET('typeEvents','getbyId'),
        type:'POST',
        data:{
            idType
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                idTypeEvent = result.dataset.id;
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
//Delete the type Event
function confirmDelete(){
    
    $.ajax({
        url:requestDELETE('typeEvents','Deletetype'),
        type:'POST',
        data:{idTypeEvent},
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'¡Tipo de evento eliminado correctamente!'});
                $('#ModalDeleteType').modal('close');
                callTypes();
            }
            else{
                M.toast({html:result.exception});
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
$('#openPdf').click(function(){
    window.open('private_reports/typeEvents.php');
})
$('#eventsTypePDF').click(function(){
    window.open('private_reports/eventsperType.php');
})
