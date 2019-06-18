$(document).ready(function () {
    CallTimeline();
});
function setTimeLine(actions){
    console.log(actions);
    let content ='';
    if(actions.length>0){
        actions.forEach(function(action){

            var fecha = moment(action.date);
            var day = fecha.lang('es').date();

            content+=`
                <div class="timeline">
                    <div class="timeline__group">
                        <div class="timeline__box">
                            <div class="timeline__date">
                                <span class="timeline__day">${day}</span>
                                <span class="timeline__month">${ fecha.lang('es').format('MMMM') }</span>
                                <span class="timeline__month">${ fecha.lang('es').format('YYYY') }</span>
                            </div>
                            <div class="timeline__post">
                                <div class="timeline__content">
                                    <p class="grey-text"> ${ fecha.lang('es').format('dddd') } </p>
                                    <p>${action.action_performed} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        })
    }
    $('#Timeline').html(content);
}
function CallTimeline(){
    $.ajax(
        {
            url:requestGET('Binnacle','getBinnacle'),
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(!result.status){
                    ToastError(result.exception);
                }
                setTimeLine(result.dataset);
               
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR); 
    })
}