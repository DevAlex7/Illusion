$(document).ready(function () {
    showProfile();
});
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
                    $('#user-div-name').html(`<span id="name-user">${result.dataset.name}</span>`);
                    $('#user-div-lastname').html(`<span id="lastname-user">${result.dataset.lastname}</span>`);
                    $('#user-div-email').html(`<span id="lastname-user">${result.dataset.email}</span>`);
                    $('#user-div-username').html(`<span id="username-user">${result.dataset.username}</span>`);
                }
                else{

                }
            }
            else{

            }
        }
    )
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}