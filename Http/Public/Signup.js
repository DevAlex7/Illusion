$(document).ready(function () {

});
$('#FormRegistrer').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPublicPOST('userEmployees','createUserpublic'),
            type:'POST',
            data:$('#FormRegistrer').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    ToastSucces('Se ha registrado correctamente');
                    ClearForm('FormRegistrer');
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
})

$('#FormLogin').submit(function(){
    event.preventDefault();
    $.ajax(
        {
            url:requestPublicPOST('userEmployees','Loginpublic'),
            type:'POST',
            data:$('#FormLogin').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    $(location).attr('href','/Illusion/user/requests.php');
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
})

