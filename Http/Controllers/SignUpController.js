
$(document).ready(function () {
});

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
                M.toast({html:'Añadido correctamente'});
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