$(document).ready(function() {
  CallEmployees();
  $(".modal").modal();
});

function setEmployees(employees) {
  let content = "";
  if (employees.length > 0) {
    employees.forEach(function(employe) {
      if(parseInt(employe.role) == 0){
        content += `
        <div class="col s12 m3">
            <div class="card z-depth-5" id="CardDetail">
                <div class="card-content">
                    <div class="center-align">
                        <span class="card-title"> <i class="material-icons blue-text">assignment_ind</i> </span>
                    </div>
                    <div class="divider"></div>
                    <div class="center-align" id="DetailsEmployee">
                        <span class="grey-text card-title">${
                          employe.name
                        }</span>
                        <span class="grey-text card-title">${
                          employe.lastname
                        }</span>
                    </div>
                    <div id="MoreDetails">
                        <div class="center-align">
                            <span class="grey-text">Correo</span>
                        </div>
                        <div id="OtherDetails">
                            <div class="center-align" id="EmailPart">
                                <div class="z-depth-2 white-text" id="chipColor"> <span class="truncate">${
                                  employe.email
                                }</span> </div>
                            </div>
                            <div class="center-align" id="UsernameTitle">
                                <span class="grey-text">Usuario</span>
                            </div>
                            <div class="center-align" id="UsernamePart">
                                <div class="z-depth-2 white-text" id="chipColor">${
                                  employe.username
                                }</div>
                            </div>
                            <div class="center-align" id="UsernameTitle">
                                <span class="grey-text">Cargo</span>
                            </div>
                            <div class="center-align" id="UsernamePart">
                                <div class="z-depth-2 white-text" id="chipColor">${
                                  employe.nameRole
                                }</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center-align">
                            <div class="row">
                                <div class="col s12 m4 center-align offset-m4">
                                    <div class="card z-depth-3" id="ActionsCard">
                                        <div class="card-content">
                                            <div id="ActionsIcons">
                                                <div class="row">
                                                    <a href="#viewStadistics" class="modal-trigger" onClick="viewStadistics(${employe.id})"> <i class="material-icons blue-text">event</i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
      }
      else if(employe.role == 1){
        content += `
        <div class="col s12 m3">
            <div class="card z-depth-5" id="CardDetail">
                <div class="card-content">
                    <div class="center-align">
                        <span class="card-title"> <i class="material-icons blue-text">assignment_ind</i> </span>
                    </div>
                    <div class="divider"></div>
                    <div class="center-align" id="DetailsEmployee">
                        <span class="grey-text card-title">${
                          employe.name
                        }</span>
                        <span class="grey-text card-title">${
                          employe.lastname
                        }</span>
                    </div>
                    <div id="MoreDetails">
                        <div class="center-align">
                            <span class="grey-text">Correo</span>
                        </div>
                        <div id="OtherDetails">
                            <div class="center-align" id="EmailPart">
                                <div class="z-depth-2 white-text" id="chipColor"> <span class="truncate">${
                                  employe.email
                                }</span> </div>
                            </div>
                            <div class="center-align" id="UsernameTitle">
                                <span class="grey-text">Usuario</span>
                            </div>
                            <div class="center-align" id="UsernamePart">
                                <div class="z-depth-2 white-text" id="chipColor">${
                                  employe.username
                                }</div>
                            </div>
                            <div class="center-align" id="UsernameTitle">
                                <span class="grey-text">Cargo</span>
                            </div>
                            <div class="center-align" id="UsernamePart">
                                <div class="z-depth-2 white-text" id="chipColor">${
                                  employe.nameRole
                                }</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center-align">
                            <div class="row">
                                <div class="col s12 m4 center-align offset-m4">
                                    <div class="card z-depth-3" id="ActionsCard">
                                        <div class="card-content">
                                            <div id="ActionsIcons">
                                                <div class="row">
                                                    <a href="#viewStadistics" class="modal-trigger" onClick="viewStadistics(${employe.id})"> <i class="material-icons blue-text">event</i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
      }
      else{
        content += `
        <div class="col s12 m3">
            <div class="card z-depth-5" id="CardDetail">
                <div class="card-content">
                    <div class="center-align">
                        <span class="card-title"> <i class="material-icons blue-text">assignment_ind</i> </span>
                    </div>
                    <div class="divider"></div>
                    <div class="center-align" id="DetailsEmployee">
                        <span class="grey-text card-title">${
                          employe.name
                        }</span>
                        <span class="grey-text card-title">${
                          employe.lastname
                        }</span>
                    </div>
                    <div id="MoreDetails">
                        <div class="center-align">
                            <span class="grey-text">Correo</span>
                        </div>
                        <div id="OtherDetails">
                            <div class="center-align" id="EmailPart">
                                <div class="z-depth-2 white-text" id="chipColor"> <span class="truncate">${
                                  employe.email
                                }</span> </div>
                            </div>
                            <div class="center-align" id="UsernameTitle">
                                <span class="grey-text">Usuario</span>
                            </div>
                            <div class="center-align" id="UsernamePart">
                                <div class="z-depth-2 white-text" id="chipColor">${
                                  employe.username
                                }</div>
                            </div>
                            <div class="center-align" id="UsernameTitle">
                                <span class="grey-text">Cargo</span>
                            </div>
                            <div class="center-align" id="UsernamePart">
                                <div class="z-depth-2 white-text" id="chipColor">${
                                  employe.nameRole
                                }</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center-align">
                            <div class="row">
                                <div class="col s12 m4 center-align offset-m4">
                                    <div class="card z-depth-3" id="ActionsCard">
                                        <div class="card-content">
                                            <div id="ActionsIcons">
                                                <div class="row">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
      }
    });
  }
  $("#GetPersons").html(content);
}
function CallEmployees() {
  $.ajax({
    url: requestGET("userEmployees", "ListEmployees"),
    type: "POST",
    data: null,
    datatype: "JSON"
  })
    .done(function(response) {
      if (isJSONString(response)) {
        const result = JSON.parse(response);
        if (!result.status) {
          ToastError(result.exception);
        }
        setEmployees(result.dataset);
      } else {
        console.log(response);
      }
    })
    .fail(function(jqXHR) {
      catchError(jqXHR);
    });
}

function viewProductsActivity(id){
  var idEmployee = id;
  $.ajax(
    {
      url:requestPOST('userEmployees','productsActivity'),
      type:'POST',
      data:{
        idEmployee  
      },
      datatype:'JSON',
      cache:false
    }
  )
  .done(function(response)
    {
      if(isJSONString(response)){
        const result = JSON.parse(response);
        if(result.status){
          var events =[];
          var count = [];
          for(i in result.dataset){
            events.push(result.dataset[i].name_event);
            count.push(result.dataset[i].numberCount);
            productsEvents('listProduct', events,count);
          }
        }
        else{
        }
      }
      else{
        console.log(response);
      }
    }
  )
  .fail(function(jqXHR) {
    catchError(jqXHR);
  });
}
function eventTypes(id){
  var idEmployee = id;
  $.ajax(
    {
      url:requestPOST('userEmployees','typeEventsActivity'),
      type:'POST',
      data:{
        idEmployee  
      },
      datatype:'JSON',
      cache:false
    }
  )
  .done(function(response)
    {
      if(isJSONString(response)){
        const result = JSON.parse(response);
        if(result.status){
            console.log(result.dataset);
            var types =[];
            var count =[];
            for(i in result.dataset){
              types.push(result.dataset[i].type);
              count.push(result.dataset[i].countType);
              typeEventsUser('canvasTypeEvents',count, types);
            }
            console.log(types);
            console.log(count);
        }
        else{
        }
      }
      else{
        console.log(response);
      }

    }
  )
  .fail(function(jqXHR) {
    catchError(jqXHR);
  });

}
function viewStadistics(id)
{
    var idEmployee = id;
    let content ='';
    $.ajax(
      {
        url:requestPOST('userEmployees','eventsActivity'),
        type:'POST',
        data:{
          idEmployee  
        },
        datatype:'JSON',
        cache:false
      }
    )
    .done(function(response)
      {
        if(isJSONString(response)){
          const result = JSON.parse(response);
          if(result.status){
            var dates =[];
            var count =[];     

            for(i in result.dataset){
              dates.push(result.dataset[i].eventCreated);
              count.push(result.dataset[i].countActivity);
            }
            eventsActivityUser('eventsinActivity',dates, count);
            viewProductsActivity(idEmployee);
            eventTypes(idEmployee);
          }
          else{
            eventsActivityUser('eventsinActivity',[0], [0]);   
          }
        }
        else{
          console.log(response);
        }
      }
    )
    .fail(function(jqXHR) {
      catchError(jqXHR);
    });
}
