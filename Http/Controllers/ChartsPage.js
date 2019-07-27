$(document).ready(function () {
    chartType();
});
// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../Api/events.php?request=GET&action=';

// Función para graficar la cantidad de productos por categoría
function chartType()
{
    $.ajax({
        url: api + 'chartEvent',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se remueve la etiqueta canvas
            if (result.status) {
                let type = [];
                let counting = [];
                result.dataset.forEach(function(row){
                    type.push(row.type);
                    counting.push(row.counting);
                });
                barGraph('chart', type, counting, 'Cantidad de eventos', '')
            } else {
                $('#chart').remove();
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
