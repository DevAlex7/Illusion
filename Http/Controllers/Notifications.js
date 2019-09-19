$(document).ready(function () {
    
});
const setBlocks = (usersBlock) => {
    let content = '';

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
        }
        else{
            console.log(response);
        }
    })
}
