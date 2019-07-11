$(document).ready(function () {
    selectTypeEvents('typeEvents', null);
    combobox('month');
    $('.datepicker').datepicker();
    
});

function selectTypeEvents(Select, value){
    $.ajax({
        url: requestGET('typeEvents','getTypesEvents'),
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione tipo de evento</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.id != value) {
                        content += `<option value="${row.id}">${row.type}</option>`;
                    } else {
                        content += `<option value="${row.id}" selected>${row.type}</option>`;
                    }
                });
                $('#' + Select).html(content);
            } else {
                $('#' + Select).html('<option value="">No hay tipos de eventos</option>');
            }
            $('select').formSelect();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
$('#RequestForm').submit(function(){
    event.preventDefault();

    $.ajax(
        {
            url:requestPOST('Request','sendRequest'),
            type:'POST',
            data:$('#RequestForm').serialize(),
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result  = JSON.parse(response);
                if(result.status){
                    ToastSucces('Petición enviada correctamente');
                    ClearForm('RequestForm');
                }else{
                    ToastError(result.exception);
                }
            }
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){
        catchError(jqXHR);
    })
})
function callProducts(){
    $.ajax(
        {   
            
        }

    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
            }else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){

    })
}