$(document).ready(function () {
    setSidenavItem('notify-item','icon-notify');
    readBlock();
});
const setBlocks = (usersBlock) => {
    let content = '';
    if(usersBlock.length > 0){
        usersBlock.map( userNotification => {
        content += `
            <div class="col s12 m9">
                <div class="card" id="notificationCard">
                    <div class="card-content">
                        <p class="" id="notification">${userNotification.notification}</p>
                        <a class="btn-small indigo" href="javascript:restoreUser(${userNotification.id})" id="unlock">Desbloquear</a>
                    </div>
                </div>
            </div>
        `;
        })
    }else{
        content = `
        <div class="col s12 m9">
            <div class="card" id="notificationCard">
                <div class="card-content">
                    <p class="" id="notification">No hay usuarios bloqueados</p>
                </div>
            </div>
        </div>
        `;
    }
    $('#results').html(content);
}
const readBlock = () => {
    $.ajax(
        {
            url:requestPOST('Auth','notifications-block'),
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done((response)=> {
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
            }
            setBlocks(result.dataset);
        }
        else{
            console.log(response);
        }
    })
}
const restoreUser=(id)=>{
    $.ajax(
        {
            url:requestPUT('userEmployees','restoreUser'),
            type:'POST',
            data:{
                id
            },
            datatype:'JSON'
        }
    )
    .done((response)=>{
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                ToastSucces('Usuario restablecido correctamente');
                readBlock();
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