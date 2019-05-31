$(document).ready(function () {
    selectTypeEvents('TypeEventSelect',null);
    $('.modal').modal();
    CallEvents();
});
function setEvents(events){
    console.log(events);
    let content ='';
    if(events.length>0){
        events.forEach(function(event){
            content+=`
            <div class="col s12 m12">
                <div class="card-panel z-depth-2">
                        <blockquote id="PrincipalEvent">
                            <p>Evento: ${event.name_event}</p>
                            <blockquote id="DetailEvent"> <p>Cliente: ${event.client_name}</p> </blockquote>
                            <blockquote id="DetailEvent"> <p>Fecha de evento: ${event.date}</p> </blockquote>
                            <blockquote id="DetailEvent"> <a href="/Illusion/private/eventview.php?event=${event.id}">Ver evento</a></blockquote>
                        </blockquote>
                </div>
            </div>
            `;
        })
    }
    $('#Information').html(content);
}
function CallEvents(){
    $.ajax({
        url:requestGET('events','getEvents'),
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
            setEvents(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
$('#FormCreateEvent').submit(function(){
    event.preventDefault();
    $.ajax({
        url:requestPOST('events','saveEvent'),
        type:'POST',
        data:$('#FormCreateEvent').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        
        if(isJSONString(response)){
            
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Agregado correctamente'});
                $('#FormCreateEvent')[0].reset();
                $('#CreateEvent').modal('close');
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
//Get all types of events
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
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}