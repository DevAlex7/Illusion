$(document).ready(function () {
  setSidenavItem('profile-item','icon-profile');
  showProfile();
});
const data = {
    id : '',
    name : '',
    lastname :'',
    email : '',
    username : ''
}

const showProfile = () => {
    $.ajax(
        {
            url:requestGET('userEmployees','getmyProfile'),
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
                    $('#user-div-name').html(`
                        <span id="name-user">${result.dataset.name}</span>
                        <input type="hidden" id="name-input" name="name-input" value="${result.dataset.name}">
                        <input type="hidden" id="id-input" name="id-input" value="${result.dataset.id}">
                    `);
                    $('#user-div-lastname').html(`
                        <span id="lastname-user">${result.dataset.lastname}</span>
                        <input type="hidden" id="lastname-input" name="lastname-input" value="${result.dataset.lastname}">
                    `);
                    $('#user-div-email').html(`
                        <span id="email-user">${result.dataset.email}</span>
                        <input type="hidden" id="email-input" name="email-input" value="${result.dataset.email}">
                    `);
                    $('#user-div-username').html(`
                        <span id="username-user">${result.dataset.username}</span>
                        <input type="hidden" id="username-input" name="username-input" value="${result.dataset.username}">
                    `);

                    data.id = result.dataset.id;
                    data.name = result.dataset.name;
                    data.lastname = result.dataset.lastname;
                    data.email = result.dataset.email,
                    data.username = result.dataset.username;

                    $('#buttonsControl').html(`<a class="btn orange" onclick="edit()"  id="editProfile"> <i class="material-icons left">edit</i> Editar </a>`); 

                    eventsCreated(data.id);
                    
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
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}



function edit(){
    $('#name-user, #lastname-user, #email-user, #username-user').hide();
    
    $('#name-input').get(0).type='text';
    $('#lastname-input').get(0).type='text';
    $('#email-input').get(0).type='text';
    $('#username-input').get(0).type='text';

    $('#buttonsControl').html(
        `   <a class="btn green accent-4" id="acceptChange" onClick="editProfile()"> <i class="material-icons left">edit</i> Aceptar </a>
            <a class="btn red" id="declineChange" onClick="cancelEdit()"> <i class="material-icons left">close</i> Cancelar </a>
        `
    );
    
}
function cancelEdit(){
    $('#editProfile, #name-user, #lastname-user, #email-user, #username-user').show();
    
    $('#name-input').get(0).type='hidden';
    $('#lastname-input').get(0).type='hidden';
    $('#email-input').get(0).type='hidden';
    $('#username-input').get(0).type='hidden';
    
    $('#buttonsControl').html('');
    $('#buttonsControl').html(`<a class="btn orange" onclick="edit()"  id="editProfile"> <i class="material-icons left">edit</i> Editar </a>`);
}

const editPass = () =>{
  //event.prevensetPasswordtDefault();
  const information={
    id : $('#id-input').val(),
    pass1 : $('#pass1').val(),
    pass2 : $('#pass2').val(),
    pass3 : $('#pass3').val(),
    username : $('#username-input').val()
  }
  $.ajax({
      url: requestPUT('userEmployees','updatePassword'),
      type: 'POST',
      data: {information},
      datatype: 'JSON'
  })
  .done(function(response){
      if (isJSONString(response)) {
          const result = JSON.parse(response);
          if (result.status) {
              ToastSucces('¡Contraseña actualizada correctamente!');
          } else {
            ToastError(result.exception);
          }
      } else {
          console.log(response);
      }
  })
  .fail(function(jqXHR){
      console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
  });
}

const editProfile = () => {
    const information = {
        id : $('#id-input').val(),
        name : $('#name-input').val(),
        lastname : $('#lastname-input').val(),
        email : $('#email-input').val(),
        username : $('#username-input').val()
    }
    $.ajax(
        {
            url:requestPUT('userEmployees','updateProfile'),
            type:'POST',
            data:{
                information
            },
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    ToastSucces('¡Perfil actualizado correctamente!');
                    cancelEdit();
                    $('#user-div-name').html(`
                        <span id="name-user">${result.dataset.name}</span>
                        <input type="hidden" id="name-input" name="name-input" value="${result.dataset.name}">
                        <input type="hidden" id="id-input" name="id-input" value="${result.dataset.id}">
                    `);
                    $('#user-div-lastname').html(`
                        <span id="lastname-user">${result.dataset.lastname}</span>
                        <input type="hidden" id="lastname-input" name="lastname-input" value="${result.dataset.lastname}">
                    `);
                    $('#user-div-email').html(`
                        <span id="email-user">${result.dataset.email}</span>
                        <input type="hidden" id="email-input" name="email-input" value="${result.dataset.email}">
                    `);
                    $('#user-div-username').html(`
                        <span id="username-user">${result.dataset.username}</span>
                        <input type="hidden" id="username-input" name="username-input" value="${result.dataset.username}">
                    `);

                    data.id = result.dataset.id;
                    data.name = result.dataset.name;
                    data.lastname = result.dataset.lastname;
                    data.email = result.dataset.email,
                    data.username = result.dataset.username;

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
const eventsCreated = (id) => {

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
            console.log(result.dataset);
            var dates =[];
            var count =[];     

            for(i in result.dataset){
              dates.push(result.dataset[i].eventCreated);
              count.push(result.dataset[i].countActivity);
            }

            $('#canvasEvent').html(`<canvas id="canvas-createdEvents"> </canvas>`);
            
            myEvents('canvas-createdEvents',dates, count);

            viewProductsActivity(data.id);

            typeEvents(data.id);
          }
          else{
            $('#canvasEvent').html(`<canvas id="canvas-createdEvents"> </canvas>`);
            myEvents('canvas-createdEvents',[0], [0]);   
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

const viewProductsActivity = (id) =>{
    $('#canvasProducts').html('');
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
            console.log(events);
                if(events.length>0){
                    $('#canvasProducts').html(`<canvas id="productsCanvas"></canvas>`);
                    myProducts('productsCanvas', events, count);
                }
                    else{
                    $('#canvasProducts').html('');
                }
                
            }
            else{
                $('#canvasProducts').html(`<canvas id="productsCanvas"></canvas>`);
                myProducts('productsCanvas', [0], [0]);
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

const typeEvents = (id) => {
    $('#canvasTypeEvents').html('');
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
              $('#canvasTypeEvents').html(`<canvas id="typeEventscanvas"></canvas>`);
              myTypesEvents('typeEventscanvas',types, count);
          }
          else{
            $('#canvasTypeEvents').html(`<canvas id="typeEventscanvas"></canvas>`);
            typeEventsUser('typeEventscanvas',[0], [0]);
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