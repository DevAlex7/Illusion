var time = 0;
$(document).ready(function () {
   var Interval = setInterval(timerIncrement,60000);
   
   $(this).mousemove(function(e){
       time = 0;
   })
   $(this).keypress(function(e){
       time = 0;
   })
});
function timerIncrement(){
    time++;
    if(time > 0){
        location.href='index.php';
    }
}