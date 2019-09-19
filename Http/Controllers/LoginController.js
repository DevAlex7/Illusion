$(document).ready(function () {
    countUsers();
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
            if(result.status == 1){
                M.toast({html:'Logueado correctamente'});
                $(location).attr('href',result.site);
            }
            else if(result.status == 2){
                $(location).attr('href',result.site);
            }
            else if(result.status == 3){
                M.toast({
                    html:result.exception
                });
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
            }
            else{
                //location.href ='../private/signup.php'
            }   
        }
        else{
            console.log(response);
        }
    })
}
$('#buttonR').click(()=>{
    event.preventDefault();
    var username = $('#Nickname').val();
    if(username != ''){
        $.ajax(
            {
                url:requestPOST('userEmployees','valid-recover'),
                type:'POST',
                data:{
                    username
                },
                datatype:'JSON'
            }
        )
        .done((response)=>{
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status == 1){
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
    }
    else{
        M.toast({html:'Se requiere de un usuario para recuperar su contraseña'});
    }
})
$('#recoverPass').submit(function(){
    event.preventDefault();
    $.ajax({
        url:requestPOST('Auth','recover-auth'),
        type:'POST',
        data:$(this).serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                let content ='';
                content=`
                <div class="row">
                    <div class="col s12 m12">
                        <span class="card-title" id="saludate">Recuperar contraseña.</span>
                        <span class="grey-text" id="descriptionSaludate">Restablece la contraseña.</span>
                    </div>
                    <div class="col s12 m12">
                        <form class="col s12 m12" method="POST" id="recover">
                            <div class="row">
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="pass1" name="pass1" type="password" placeholder="Nueva contraseña" autocomplete="off">
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="pass2" name="pass2" type="password" placeholder="Confirme nueva contraseña" autocomplete="off">
                                </div>
                            </div>
                            <a class="btn col s12 m12 red" id="buttonLogin" onClick="recover()"> <i class="material-icons right">arrow_forward</i> <span id="buttonTitle">Cambiar</span> </a>
                        </form>
                    </div>
                </div>
                `;
                $('#content').html(content);
                
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
const recover = () => {
    var pas1 = $('#pass1').val();
    var pas2 = $('#pass2').val();

    $.ajax(
        {
            url:requestPOST('Auth','recover'),
            type:'POST',
            data:{
                pas1, pas2
            },
            datatype:'JSON'
        }
    )
    .done((response)=>{
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
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

}