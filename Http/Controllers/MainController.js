$(document).ready(function () {
   //testNodeJs();
});
function testNodeJs(){
    $.ajax({
        url:'http://localhost:3000/requests/delete/23',
        type:'DELETE',
        data:null,
        datatype:'JSON'
    })
    .done(function(res){
        if(res.status == 200){
            console.log(res.data);
        }
        else{
            console.log(res);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}