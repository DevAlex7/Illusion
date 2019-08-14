$(document).ready(function () {
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