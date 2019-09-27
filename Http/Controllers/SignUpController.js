$(document).ready(function () {
    countUsers();
});
const countUsers = () => {
    $.ajax(
        {
            url:requestGET('userEmployees','countUsers'),
            type:'GET',
            data:null,
            datatype:'JSON'
        }
    )
    .done((response)=>{
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#btnSignUp').removeClass('disabled');
            }
            else{
                $('#btnSignUp').addClass('disabled');
            }   
        }
        else{
            console.log(response);
        }
    })
}
$('#FormRegistrer').submit(function(){
    event.preventDefault();
     $.ajax({
        url: requestPOST('userEmployees','CreateUser'),
        type:'POST',
        data: $('#FormRegistrer').serialize(),
        datatype: 'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
<<<<<<< HEAD
                M.toast({html:'Añadido correctamente'}, 'index.php');

=======
                M.toast({html:'Añadido correctamente'});
                location.href='../private/';
>>>>>>> 40e7dbdd83676e3c3833599177bf8a9f6a369374
            }
            else{
                M.toast({html:result.exception});
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