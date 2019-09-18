$(document).ready(function () {
    verify();
});
const verify = () => {
    $.ajax(
        {
            url:requestPOST('Auth','verify-TwoSteps'),
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done((response) => {
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status == 1){
                $('#switch').attr('checked',true);
            }
            else if(result.status == 2){
                $('#switch').attr('checked',false);
            }
            else{
                ToastError(result.exception);
            }
        }
        else{
            console.log(response);
        }
    })
}
const configure =()=>{
    var option;
    if( $('#switch').is(':checked') ){
        option = 1;
    }else{
        option = 2;
    }
    
    $.ajax(
        {
            url:requestPOST('Auth','Auth-configure'),
            type:'POST',
            data:{
                option
            },
            datatype:'JSON'
        }
    )
    .done((response) => {
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                ToastSucces('Configurado');
            }
            else{
                ToastError(result.exception);
            }
        }
        else{
            console.log(response);
        }
    })
    
}

