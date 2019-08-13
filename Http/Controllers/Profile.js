$(document).ready(function () {
    alert("dsd");
});
const showProfile = () => {
    $.ajax(
        {
            url:requestGET('',''),
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){

            }
            else{

            }
        }
    )
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}