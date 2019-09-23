$(document).ready(function () {
    setSidenavItem('events-item','icon-event');   
    selectTypeEvents('TypeEventSelect',null);
    $('.modal').modal();
    CallEvents();
});
function setEvents(events){
        let content ='';
    if(events.length>0){
        events.forEach(function(event){

            var fecha = moment(event.date);
            
            content+=`
            <div class="col s12 m12">
                <div class="card z-depth-4" id="CardEvent">
                    <div class="card-content">
                        <blockquote id="PrincipalEvent">
                            <p>Evento: ${event.name_event}</p>
                            <blockquote id="DetailEvent"> <p>Cliente: ${event.client_name}</p> </blockquote>
                            <blockquote id="DetailEvent"> <p>Fecha de evento: ${ fecha.lang('es').format('dddd D MMMM , YYYY') }</p> </blockquote>
                            <blockquote id="DetailEvent"> <p>Fecha de evento: ${ fecha.lang('es').format('dd MMM D YYYY') }</p> </blockquote>
                            <blockquote id="DetailEvent"> <a href="/Illusion/private/eventview.php?event=${event.id}">Ver evento</a></blockquote>
                        </blockquote>
                    </div>
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
               ToastError(result.exception);
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
                ToastSucces('¡Evento agregado correctamente!')
                ClearForm('FormCreateEvent')
                closeModal('CreateEvent');
                CallEvents();
                
            }
            else{
                ToastError(result.exception);
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
//Buscar evento
$('#SearchForm').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPOST('events','Search'),
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
                setEvents(result.dataset);
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
