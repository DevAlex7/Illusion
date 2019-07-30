//Line chart
/**
@param1 id del canvas, 
@param2 un arreglo de los de productos por evento
@param3 un arreglo de la cantidad de esos productos 
 */
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

//Bar Chart
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
function requestbyStates(id, states , count){
  var ctx = $('#'+id);
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: states,
        datasets: [{
            label: '# of Votes',
            data: count,
            text: "ff",
            backgroundColor: [
                
                'green',
                'grey',
                'red'
            ],
            borderColor: [
                'white'
            ],
            borderWidth: 1
        }]
    },
    options: {
        rotation: 1 * Math.PI,
        circumference: 1 * Math.PI
    }
  });
}
function EventsbyStates(id, states , count){
  var ctx = $('#'+id);
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: states,
        datasets: [{
            label: '# of Votes',
            data: count,
            text: "ff",
            backgroundColor: [
              'grey',
                'green',

            ],
            borderColor: [
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        rotation: 1 * Math.PI,
        circumference: 1 * Math.PI
    }
  });
}

function requestsInformation(id, requestsDates, count){
  console.log(requestsDates);
  console.log(count);
  console.log(id);
  if(count.length>0){
      var chartdata = {
          labels: requestsDates,
          datasets : [
              {
                  backgroundColor: 'transparent',
                  borderColor:'grey',
                  pointBorderColor: "blue",
                  hoverBackgroundColor: 'black',
                  hoverBorderColor: 'rgba(200, 200, 200, 1)',
                  data: count
              },
          ]
      };
  
      var idDeCanvas = $("#"+id);
        
      var barGraph = new Chart(idDeCanvas , {
              type: 'line',
              data: chartdata,
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
                  scales:{
                      yAxes: [{
                          ticks: {
                              fontColor: "black",
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
                              fontColor: "black",
                              fontStyle: "bold"
                          }
                      }]
                  },
                  gridLines: {
                      display: true,
                      color: "black",
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
