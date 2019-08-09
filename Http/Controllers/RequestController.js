$(document).ready(function () {
    $('.modal').modal();    
    $('.collapsible').collapsible();
    CallRequests();
    RequestsbyStates();
});
var date1;
var date2;
function setRequests(requests){
    let content ='';
    if(requests.length>0){
        requests.forEach(function(request){
            if(request.status==2){
                content +=`
                    <div class="col s12 m12">
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">archive</i>Petición de : ${request.name+" "+request.lastname}</div>
                                <div class="collapsible-body">
                                    <table class="responsive-table">
                                        <thead>
                                        <tr>
                                            <th>Correo</th>
                                            <th>Fecha de evento solicitado</th>
                                            <th>Tipo de evento</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                
                                        <tbody>
                                            <tr>
                                                <td>${request.email}</td>
                                                <td>${request.date_event}</td>
                                                <td>${request.type_event}</td>
                                                <td> <div class="chip red white-text"> <span> ${request.status_event} </span> </div> </td>
                                                <td> <a class="btn green accent-4" onClick="updateStatus(${request.id},${1}, ${request.idUser})">Aceptar</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row" id="Description">
                                        <p>${request.description_event}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
            `;
            }
            else if(request.status==1){
                content +=`
                    <div class="col s12 m12">
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">archive</i>Petición de : ${request.name+" "+request.lastname}</div>
                                <div class="collapsible-body">
                                    <table class="responsive-table">
                                        <thead>
                                        <tr>
                                            <th>Correo</th>
                                            <th>Fecha de evento solicitado</th>
                                            <th>Tipo de evento</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                
                                        <tbody>
                                            <tr>
                                                <td>${request.email}</td>
                                                <td>${request.date_event}</td>
                                                <td>${request.type_event}</td>
                                                <td> <div class="chip green accent-4 white-text"> <span> ${request.status_event} </span> </div> </td>
                                                <td> No hay acciones </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row" id="Description">
                                        <p>${request.description_event}</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
            `;
            }
            else{
                content +=`
            <div class="col s12 m12">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">archive</i>Petición de : ${request.name+" "+request.lastname}</div>
                        <div class="collapsible-body">
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <th>Correo</th>
                                    <th>Fecha de evento solicitado</th>
                                    <th>Tipo de evento</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                        
                                <tbody>
                                    <tr>
                                        <td>${request.email}</td>
                                        <td>${request.date_event}</td>
                                        <td>${request.type_event}</td>
                                        <td> <div class="chip grey white-text"> <span> ${request.status_event} </span> </div> </td>
                                        <td> <a class="btn green accent-4" onClick="updateStatus(${request.id},${1},${request.idUser})">Aceptar</a></td>
                                        <td> <a class="btn red" onClick="updateStatus(${request.id},${2},${request.idUser})">Rechazar</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row" id="Description">
                                <p>${request.description_event}</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            `;
            }
        })
    }
    $('#RequestsList').html(content);
}
function CallRequests(){
    $.ajax(
        {
            url:requestGET('Request','listRequests'),
            type:'POST',
            data:null,
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
                setRequests(result.dataset);
                $('.collapsible').collapsible();

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
function updateStatus(id, status, id_user){

    var idStatus=status;
    var user_id = id_user; 
    $.ajax(
        {
            url:requestPUT('Request','updateRequest'),
            type:'POST',
            data:{
                id, status,user_id
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    if(idStatus==1){
                        ToastSucces('¡Petición aceptada correctamente');
                        CallRequests();
                        RequestsbyStates();
                    }
                    else{
                        ToastSucces('¡Petición rechazada correctamente');
                        CallRequests();
                        RequestsbyStates();
                    }
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
$('#Datesform').submit(function(){
    $('#chartsRequest').html('');
    date1 = $('#date1').val();
    date2 = $('#date2').val();
    event.preventDefault();
    $.ajax({
        url:requestPOST('Request','requestPerDate'),
        type:'POST',
        data:$('#Datesform').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                var count = [];
                count.push(result.dataset.count);
                console.log(count);
                $('#chartsRequest').html(`<canvas id="requestsDay"></canvas>	`);
                requestsPerDays('requestsDay',count);
                $('#moredetails').text("ver más detalles");
            }
            else{
                ToastError(result.exception);
            }
        }
        else{
            console.log(response)
        }
    })
    .fail(function(jqXHR){
        catchError(jqXHR);
    })
})
function RequestsbyStates(){
    $.ajax(
        {
            url:requestGET('Request','requestsPerState'),
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    var count = [];
                    var states = [];
                    for(i in result.dataset){
                        count.push(result.dataset[i].requestsCount);
                        states.push(result.dataset[i].status);
                    }
                    requestbyStates('requestsStates',states, count);
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
function viewDetails(){

    $.ajax(
        {
            url:requestPOST('Request','requestsInformation'),
            type:'POST',
            data:{
                date1:date1,
                date2:date2
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    var dates = [];
                    var count = [];

                    for(i in result.dataset){
                        dates.push(result.dataset[i].date_request);
                        count.push(result.dataset[i].countperday);
                    }

                    requestsInformation('datesDetails',dates,count);
                    
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
function viewReport(){
    window.open('private_reports/requestsDates.php?date1='+date1+'&date2='+date2);
}