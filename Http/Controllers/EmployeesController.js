$(document).ready(function() {
  $(".modal").modal();
  $(".tooltipped").tooltip();
  CallEmployees();
  $(".collapsible").collapsible();
});

function setEmployees(employees) {
  let content = "";
  if (employees.length > 0) {
    employees.forEach(function(employe) {
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
                                          employe.role
                                        }</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="center-align">
                                    <div class="row">
                                        <div class="col s12 m6 center-align offset-m3">
                                            <div class="card z-depth-3" id="ActionsCard">
                                                <div class="card-content">
                                                    <div id="ActionsIcons">
                                                        <div class="row">
                                                            <a href="#alterAdmins" class="modal-trigger"> <i class="material-icons amber-text">edit</i> </a>
                                                            <a href="#deleteAdmins" class"modal-trigger"> <i class="material-icons red-text">delete</i> </a>
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
        $(".tooltipped").tooltip();
      } else {
        console.log(response);
      }
    })
    .fail(function(jqXHR) {
      catchError(jqXHR);
    });
}
