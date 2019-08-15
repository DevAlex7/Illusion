$(document).ready(function () {
    chartType();
    chartBinnacle();
});
// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../Api/events.php?request=GET&action=';
const apiBin = '../Api/Binnacle.php?request=GET&action=';
const apiP = '../Api/events.php?request=GET&action=';

// Función para graficar la cantidad de eventos por categoría
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

// Función para graficar la bitácora
function chartBinnacle()
{
    $.ajax({
        url: apiBin + 'chartBinnacle',
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
                let date = [];
                let counting = [];
                result.dataset.forEach(function(row){
                    date.push(row.date);
                    counting.push(row.counting);
                });
                lineGraph('line', date, counting, 'Acciones realizadas', '')
            } else {
                $('#line').remove();
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

// Función para graficar la cantidad de productos
function chartByProducts()
{
    $.ajax({
        url: apiP + 'chartByProducts',
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
                let count = [];
                result.dataset.forEach(function(row){
                    count.push(row.count);
                });
                polarChart('polarArea', counting, 'Acciones realizadas', '')
            } else {
                $('#polarArea').remove();
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
$('#searchingCount').click(function(){
    var count = $('#evento').val();

    $.ajax({
        url: apiP + 'chartByProducts',
        type: 'post',
        data: {
            count : count
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se remueve la etiqueta canvas
            if (result.status) {
                let count = [];
                let products = [];
                console.log(result.dataset);
                for(i in result.dataset){
                    products.push(result.dataset[i].counting);
                    count.push(result.dataset[i].nameProduct);
                }
                
                polarChart('bar', count, products)
            } else {
                $('#bar').remove();
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})