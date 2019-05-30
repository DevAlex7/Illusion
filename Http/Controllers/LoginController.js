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