$(document).ready(function() {
  setSidenavItem('admin-item','icon-admin');   
  selectRoles('role',null);
  CallEmployees();
  $('select').formSelect();
  $(".modal").modal();
  $('.dropdown-trigger').dropdown();
});
function selectRoles(Select, value){
  $.ajax({
      url: requestGET('userEmployees','getRoles'),
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
                  content += '<option value="" disabled selected>Seleccione un rol de usuario</option>';
              }
              result.dataset.forEach(function(row){
                  if (row.id != value) {
                      content += `<option value="${row.id}">${row.role}</option>`;
                  } else {
                      content += `<option value="${row.id}" selected>${row.role}</option>`;
                  }
              });
              $('#' + Select).html(content);
          } else {
              $('#' + Select).html('<option value="">No hay roles</option>');
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
                                                <a href="#viewStadisticsPublicU" class="modal-trigger" onClick="viewRequests(${employe.id})"> <i class="material-icons blue-text">ballot</i> </a>
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
          }

          if(events.length>0){
            $('#productsChart').html(`<canvas id="listProduct"></canvas>`);
            productsEvents('listProduct', events, count);
          }
          else{
            $('#producsChart').html('');
          }
          
        }
        else{
          productsEvents('listProduct', [0], [0]);
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
  $('#typeEventsChart').html('');
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
            var types =[];
            var count =[];
            
            for(i in result.dataset){
              types.push(result.dataset[i].type);
              count.push(result.dataset[i].countType);
            }
            $('#typeEventsChart').html(`<canvas id="canvasTypeEvents"></canvas>`);
            typeEventsUser('canvasTypeEvents',count, types);
        }
        else{
          typeEventsUser('canvasTypeEvents',[0], [0]);
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
    $('#productsChart').html('');
    var idEmployee = id;
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
function viewRequests(id){
    var idEmployee = id;
    $.ajax(
      {
        url:requestPOST('Request','requestsByUser'),
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
              dates.push(result.dataset[i].date_request);
              count.push(result.dataset[i].countRequest);
            }
            eventsActivityUser('requestsUser',dates, count);
          }
          else{
            eventsActivityUser('requestsUser',[0], [0]);   
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
function setSearching(rows){
    let content ='';
    if(rows.length>0){
        rows.forEach(function(row){
          if(parseInt(row.role_id) == parseInt(0)){
            content+=`
            <div class="card z-depth-2" style="border-radius:1vh">              
              <div class="card-content row">
                  <div class="col s3">
                    <span class="black-text" id="resultName">${row.name +" "+row.lastname}</span>
                  </div>
                  <div class="col s3">
                    <span class="black-text" id="usernameSub">${row.username}</span>
                  </div>
                  <div class="col s2">
                    <span id="roleSubAdmin">${row.role}</span>
                  </div>
                  <div class="col s1">
                    <a id="moreOptions" href="javascript:viewReport(${row.id})" class="red-text"> PDF </a>
                  </div>
              </div>
            </div>
            `;
          }
          else if(parseInt(row.role_id) == parseInt(1)){
            content+=`
            <div class="card z-depth-2" style="border-radius:1vh">              
              <div class="card-content row">
                <div class="col s3">
                  <span class="black-text" id="resultName">${row.name +" "+row.lastname}</span>
                </div>
                <div class="col s3">
                  <span class="black-text" id="usernameSub">${row.username}</span>
                </div>
                <div class="col s2">
                  <span id="roleSubAdmin">${row.role}</span>
                </div>
                <div class="col s1">
                  <a id="moreOptions" href="javascript:viewReport(${row.id})" class="red-text"  > PDF </a>
                </div>
              </div>
            </div>
          `;
          }
          else{
            content+=`
            <div class="card z-depth-2" style="border-radius:1vh">              
              <div class="card-content row">
                <div class="col s3">
                  <span class="black-text" id="resultName">${row.name +" "+row.lastname}</span>
                </div>
                <div class="col s3">
                  <span class="black-text" id="usernameSub">${row.username}</span>
                </div>
                <div class="col s3">
                  <span class="green-text accent-4">${row.role}</span>
                </div>
              </div>
            </div>
          `;
          }
        })
    }
    else{
        content+=`
        <div class="card z-depth-2 red" style="border-radius:1vh">              
          <div class="card-content">
              <span class="white-text">No hay coincidencias</span>
          </div>
        </div>
        `;
    }
    $('#result').html(content);
}
$('#searching').submit(function(){
    event.preventDefault();
    $.ajax(
      {
        url:requestPOST('userEmployees','searchEmployee'),
        type:'POST',
        data:$('#searching').serialize(),
        datatype:'JSON'
      }
    )
    .done(function(response){
        if(isJSONString(response)){
          const result = JSON.parse(response);
          if(!result.status){
            
          }
          setSearching(result.dataset);
        }
        else{
          console.log(response);
        } 
    })
    .fail(function(jqXHR) {
      catchError(jqXHR);
    });

})
function viewReport(id){
  window.open('private_reports/eventPerUser.php?idUser='+id);
}
$('#reportEmployees').click(function(){
  window.open('private_reports/usersReports.php');
})
const getRan = () => {
  var code = randomStr();
  $('#pass1').val(code);
}
$('#form-addEmployee').submit(function(){
  event.preventDefault();
  $.ajax(
    {
      url:requestPOST('userEmployees','createEmployee'),
      type:'POST',
      data:$(this).serialize(),
      datatype:'JSON'
    }
  )
  .done(function(response){
      if(isJSONString(response)){
        const result = JSON.parse(response);
        if(result.status){

        }
        else{
          ToastError(result.exception);
        }
      }
      else{
        console.log(response);
      } 
  })
  .fail(function(jqXHR) {
    catchError(jqXHR);
  });
})
