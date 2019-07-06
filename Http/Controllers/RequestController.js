$(document).ready(function () {
  
    $('.collapsible').collapsible();
    CallRequests();
});
function setRequests(requests){
    let content ='';
    if(requests.length>0){
        requests.forEach(function(request){
            if(request.status==2){
                content +=`
                    <div class="col s12 m12">
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">archive</i>Petición de : ${request.name_client+" "+request.last_name}</div>
                                <div class="collapsible-body">
                                    <table class="responsive-table">
                                        <thead>
                                        <tr>
                                            <th>Correo</th>
                                            <th>Fecha de evento solicitado</th>
                                            <th>Telefono</th>
                                            <th>Tipo de evento</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                
                                        <tbody>
                                            <tr>
                                                <td>${request.e_mail}</td>
                                                <td>${request.date_event}</td>
                                                <td>${request.phone_number}</td>
                                                <td>${request.type_event}</td>
                                                <td> <div class="chip red white-text"> <span> ${request.status_event} </span> </div> </td>
                                                <td> <a class="btn green accent-4" onClick="updateStatus(${request.id},${1})">Aceptar</a></td>
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
                                <div class="collapsible-header"><i class="material-icons">archive</i>Petición de : ${request.name_client+" "+request.last_name}</div>
                                <div class="collapsible-body">
                                    <table class="responsive-table">
                                        <thead>
                                        <tr>
                                            <th>Correo</th>
                                            <th>Fecha de evento solicitado</th>
                                            <th>Telefono</th>
                                            <th>Tipo de evento</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                
                                        <tbody>
                                            <tr>
                                                <td>${request.e_mail}</td>
                                                <td>${request.date_event}</td>
                                                <td>${request.phone_number}</td>
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
                        <div class="collapsible-header"><i class="material-icons">archive</i>Petición de : ${request.name_client+" "+request.last_name}</div>
                        <div class="collapsible-body">
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <th>Correo</th>
                                    <th>Fecha de evento solicitado</th>
                                    <th>Telefono</th>
                                    <th>Tipo de evento</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                        
                                <tbody>
                                    <tr>
                                        <td>${request.e_mail}</td>
                                        <td>${request.date_event}</td>
                                        <td>${request.phone_number}</td>
                                        <td>${request.type_event}</td>
                                        <td> <div class="chip grey white-text"> <span> ${request.status_event} </span> </div> </td>
                                        <td> <a class="btn green accent-4" onClick="updateStatus(${request.id},${1})">Aceptar</a></td>
                                        <td> <a class="btn red" onClick="updateStatus(${request.id},${2})">Rechazar</a></td>
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
function updateStatus(id, status){
    var idStatus=status;
   $.ajax(
        {
            url:requestPUT('Request','updateRequest'),
            type:'POST',
            data:{
                id, status
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
                    }
                    else{
                        ToastSucces('¡Petición rechazada correctamente');
                        CallRequests();
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


