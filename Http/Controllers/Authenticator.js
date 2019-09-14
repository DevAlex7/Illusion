$(document).ready(function () {
});
function lever(){
    
}
$('#authButton').click(function(){
    event.preventDefault();
    var information = {
        token : $('#secretKey').val()
    }
    $.ajax({
        url:requestPOST('Auth','setVerification'),
        type:'POST',
        data:information,
        datatype:'JSON'  
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                ToastSucces('Verificación de dos pasos incluida');
            }
            else{
                ToastError(result.exception);
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        catchError(jqXHR); 
    })
})
