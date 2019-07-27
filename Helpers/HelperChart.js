function productPerEvent(id, products, count){
    if(count.length>0){
        var chartdata = {
            labels: products,
            datasets : [
                {
                    backgroundColor: 'white',
                    borderColor:'white',
                    pointBorderColor: "black",
                    hoverBackgroundColor: 'red',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',
                    data: count
                },
            ]
        };
    
        var idDeCanvas = $("#Canvas-"+id);
          
        var barGraph = new Chart(idDeCanvas , {
                type: 'line',
                data: chartdata,
                options: {
                    legend: {
                        labels: {
                                generateLabels: function(chart) {
                                    labels = Chart.defaults.global.defaultFontColor = 'white';
                                return labels
                                }
                        },
                        display: false,
                    },
                    scales:{
                        yAxes: [{
                            ticks: {
                                fontColor: "white",
                                fontStyle: "bold",
                                beginAtZero: true,
                                padding: 20,
                                stepSize: 1
                            },
                            gridLines: {
                                drawTicks: false,
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                zeroLineColor: "transparent"
                            },
                            ticks: {
                                padding: 20,
                                fontColor: "white",
                                fontStyle: "bold"
                            }
                        }]
                    },
                    gridLines: {
                        display: true,
                        color: "white",
                    },
                    tooltips: {
                        callbacks: {
                            label: tooltipItem => `${tooltipItem.yLabel}: ${tooltipItem.xLabel}`, 
                            title: () => null,
                        }
                    },
                },
            },
        );   
    }
    else{
        $('#Card-'+id).remove();
    }   
    
}
function requestsPerDays(id, count){
    var coloR3 = [];

    coloR3.push('#'+(Math.random()*0xFFFFFF<<0).toString(16));

    var ctx = $("#"+id);

    //bar chart data
    var data = {
      labels: ['Solicitudes'],
      datasets: [
        {
          data: count,
          backgroundColor: coloR3,
          borderColor: [
            "rgba(10,20,30,1)",
            "rgba(10,20,30,1)",
            "rgba(10,20,30,1)",
            "rgba(10,20,30,1)",
            "rgba(10,20,30,1)"
          ],
          borderWidth: 1
        },
      ]
    };
  
    //options
    var options = {
      responsive: true,
      title: {
        display: true,
        position: "top",
        fontSize: 18,
        fontColor: "white"
      },
      legend: {
        display: false,
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            stepSize: 1
          }
        }]
      }
    };
  
    //create Chart class object
    var chart = new Chart(ctx, {
      type: "bar",
      data: data,
      options: options
    });
    
}