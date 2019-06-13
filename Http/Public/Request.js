$(document).ready(function () {
    selectTypeEvents('TIpoeventos', null);
});
function selectTypeEvents(Select, value){
    $.ajax({
        url: requestPublicGET('typeEvents','getTypes'),
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
            url:requestPublicPOST('Request','sendRequest'),
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
                    cleanForm('RequestForm');
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