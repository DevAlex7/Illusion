$('#formAuth').submit(function(){
    event.preventDefault();
    $.ajax({
        url:requestPOST('Auth','Login-Authentication'),
        type:'POST',
        data:$('#formAuth').serialize(),
        datatype:'JSON'  
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result);
            if(result.status){
                location.href='../private/home.php';
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
$('#AuthUser').submit(function(){
    event.preventDefault();
    $.ajax({
        url:requestPOST('Auth','User-Authentication'),
        type:'POST',
        data:$('#AuthUser').serialize(),
        datatype:'JSON'  
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                location.href =result.site;
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

$('#verifyForm').submit(function(){
    event.preventDefault();
    $.ajax({
        url:requestPOST('Auth','First-Authentication'),
        type:'POST',
        data:$('#verifyForm').serialize(),
        datatype:'JSON'  
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                console.log('exito');
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
var colors = ['blue','green','red','yellow'];
$('#buttonVerify').mouseenter(function() {
    var rand = colors[Math.floor(Math.random() * colors.length)];
    $(this).css('background-color', rand);
});

$('#buttonVerify').mouseleave(function() {
    $(this).css('background-color', '');
});