/*
*   Función para generar un gráfico de barras
*
*   Expects: canvas (identificador de la etiqueta canvas), xAxis (datos para el eje X), yAxis (datos para el eje Y), legend (etiqueta para los datos) y title (título del gráfico).
*
*   Returns: ninguno.
*/
function barGraph(canvas, xAxis, yAxis, legend, title)
{
    let colors = [];
    for (i = 0; i < xAxis.length; i++) {
        colors.push('#' + (Math.random().toString(16)).substring(2, 8));
    }
    const context = $('#' + canvas);
    const chart = new Chart(context, {
        type: 'bar',
        data: {
            labels: xAxis,
            datasets: [{
                label: legend,
                data: yAxis,
                backgroundColor: colors,
                borderColor: '#000000',
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: title
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}

function lineGraph(canvas, xAxis, yAxis, legend, title)
{
    let colors = [];
    for (i = 0; i < xAxis.length; i++) {
        colors.push('#' + (Math.random().toString(16)).substring(2, 8));
    }
    const context = $('#' + canvas);
    const chart = new Chart(context, {
        type: 'line',
        data: {
            labels: xAxis,
            datasets: [{
                label: legend,
                data: yAxis,
                backgroundColor: colors,
                borderColor: '#000000',
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: title
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}

function polarChart(canvas, products, count)
{
    if(count.length>0){
        var ctx = $("#"+canvas);

        var coloR3 = [];
    
        for(i in products){
            coloR3.push('#'+(Math.random()*0xFFFFFF<<0).toString(16));
        }
    
        new Chart(ctx, {
            type: 'bar',
            data: {
              labels: products,
              datasets: [   
                {
                  label: '',
                  backgroundColor: coloR3,
                  data: count
                }
              ]
            },
            options: {
            legend: {
                labels: {
                        generateLabels: function(chart) {
                            labels = Chart.defaults.global.defaultFontColor = 'black';
                        return labels
                        }
                },
                display: false,
            },
            scales: {
                xAxes: [{
                    ticks: {
                        min: 0,
                        stepSize:1 // Edit the value according to what you need
                    }
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
        });
    }
    else{
        $('#'+idCanvas).destroy();
    }   
    
}