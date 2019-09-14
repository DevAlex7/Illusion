var time = 0;
var tries = 0;
$(document).ready(function () {
});
$('#FormLogin').submit(function(){
    event.preventDefault();
    $.ajax({
        url:requestPOST('userEmployees','Login'),
        type:'POST',
        data:$('#FormLogin').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){

                M.toast({html:'Logueado correctamente'});
                $(location).attr('href',result.site);
            }
            else{
                tries++;

                if(tries < 3 ){
                    M.toast({html:result.exception});
                }
                else{
                    ToastSucces('Tu acceso ha sido bloqueado, espera 3 minutos');
                    $('#buttonLogin').addClass('disabled');
                    setInterval(timewaiting, 60000);
                }
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

const  timewaiting = () => {
    time++;
    if(time > 0){
        $('#buttonLogin').removeClass('disabled');
    }   

}