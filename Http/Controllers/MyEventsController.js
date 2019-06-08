$(document).ready(function () {
    CallEvents();
    $('.modal').modal();
});
function setEvents(events){
        let content ='';
        if(events.length>0){
            events.forEach(function(event){

                var fecha = moment(event.date);
                console.log(event.id);
                content+=`
                <div class="col s12 m12">
                    <div class="card z-depth-4" id="CardEvent">
                        <div class="card-content">
                            <blockquote id="PrincipalEvent">
                                <p>Evento: ${event.name_event}</p>
                                <blockquote id="DetailEvent"> <p>Cliente: ${event.client_name}</p> </blockquote>
                                <blockquote id="DetailEvent"> <p>Fecha de evento: ${ fecha.lang('es').format('dddd D MMMM , YYYY') }</p> </blockquote>
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
        url:requestGET('events','getMyEvents'),
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
//Buscar evento
$('#SearchFormMyEvents').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPOST('events','searchMyEvent'),
            type:'POST',
            data:$('#SearchFormMyEvents').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            console.log(response);
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
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})