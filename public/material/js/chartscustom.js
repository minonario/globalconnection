$(function () {
  /* ChartJS */

  "use strict";

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function currencyFormat(num) {
    return '$' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
  }


  $.fn.resumenBars = function () {

    $.ajax({
      url: relative_path + "/ajax-resume-transactions",
      type: "POST",
      data: {
      },
      success: function (response) {
        if (response) {
          console.log('Call resumen transactions');
          var data = JSON.parse(response);
          var totales = 0;

          var total = 0;
          $.each(data, function () {
            total += this;
          });

          Object.entries(data).forEach(([key, value]) => {
            var monto = (value * 100) / total;

            switch (key) {
              case 'Iniciadas':
                $('.card.ds8initiated').find('.card-title').html(monto.toFixed(2) + '%');
                $('.card.ds8initiated').find('.card-category').html(key);
                $('.card.ds8initiated').find('.stats span').html(currencyFormat(value));
                break;
              case 'Aprobadas':
                $('.card.ds8approved').find('.card-title').html(monto.toFixed(2) + '%');
                $('.card.ds8approved').find('.card-category').html(key);
                $('.card.ds8approved').find('.stats span').html(currencyFormat(value));
                break;
              case 'Rechazadas':
                $('.card.ds8reject').find('.card-title').html(monto.toFixed(2) + '%');
                $('.card.ds8reject').find('.card-category').html(key);
                $('.card.ds8reject').find('.stats span').html(currencyFormat(value));
                break;
              default:
              // code block
          }
          });

        }
      }
    });

  };

  $.fn.transactions_by_card_type = function () {

    $.ajax({
      url: relative_path + "/ajax-transactions-by-card-type",
      type: "POST",
      data: {
      },
      success: function (response) {
        if (response) {
          console.log('Call transactions by card type');
          var data = JSON.parse(response);
          var totales = 0;

          // Transacciones por tipo de tarjeta
          const data_ttt = {
            labels: data['labels'],
            datasets: [
              {
                label: 'Dataset ttt',
                data: data['data'],
                backgroundColor: [
                  'rgba(102, 162, 235, 0.8)',
                  'rgba(0, 212, 66, 0.8)',
                  'rgba(233, 44, 0, 0.8)'
                ]
              }
            ]
          };

          const config_ttt = {
            type: 'pie',
            data: data_ttt,
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'top'
                },
                title: {
                  display: false,
                  text: 'Transacciones por tipo de tarjeta'
                }
              }
            },
          };

          const ctx_ttt = document.getElementById('myChart_ttt');
          document.getElementById('myChart_ttt').style.display = "block";
          const myChart_ttt = new Chart(ctx_ttt, config_ttt);

        }
      }
    });

  };
  

  $.fn.transactions_by_card_brand = function () {
    
    
    const footer = (tooltipItems) => {
      let sum = 0;
      
      let dataArr = tooltipItems[0].dataset.data;
      dataArr.map(data => {
        sum += data;
      });
      let percentage = (tooltipItems[0].parsed * 100 / sum).toFixed(2) + "%";
      return percentage;

    };

    $.ajax({
      url: relative_path + "/ajax-transactions-by-card-brand",
      type: "POST",
      data: {
      },
      success: function (response) {
        if (response) {
          console.log('Call transactions by card brand');
          var data = JSON.parse(response);
          var totales = 0;

          // Transacciones por tipo de tarjeta
          const data_tcb = {
            labels: data['labels'],
            datasets: [
              {
                label: 'Dataset tcb',
                data: data['data'],
                backgroundColor: [
                  'rgba(102, 162, 235, 0.8)',
                  'rgba(0, 212, 66, 0.8)',
                  'rgba(233, 44, 0, 0.8)'
                ]
              }
            ]
          };

          const config_tcb = {
            type: 'pie',
            data: data_tcb,
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'top'
                },
                tooltip: {
                  callbacks: {
                    footer: footer,
                  }
                },
                datalabels: {
                  formatter: (value, ctx) => {
                    let sum = 0;
                    let dataArr = ctx.chart.data.datasets[0].data;
                    dataArr.map(data => {
                      sum += data;
                    });
                    let percentage = (value * 100 / sum).toFixed(2) + "%";
                                 console.log('log:'+percentage);
                    return percentage;
                  }, color: '#ffffff'
                },
                title: {
                  display: false,
                  text: 'Transacciones por marca de tarjeta'
                }
              }
            },
          };

          const ctx_tcb = document.getElementById('myChart_tcb');
          document.getElementById('myChart_tcb').style.display = "block";
          const myChart_tcb = new Chart(ctx_tcb, config_tcb);

        }
      }
    });

  };

  $.fn.count_transactions = function () {

    $.ajax({
      url: relative_path + "/ajax-count-transactions",
      type: "POST",
      data: {
      },
      success: function (response) {
        if (response) {
          console.log('Call count transactions');
          var data = JSON.parse(response);
          var totales = 0;

          // Amount transactions
          const data_ct = {
            labels: data['label'],
            datasets: data['datasets'],
            barPercentage: 0.5,
            barThickness: 6,
            maxBarThickness: 8
          };

          const config_ct = {
            type: 'bar',
            data: data_ct,
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'top'
                },
                title: {
                  display: false,
                  text: 'Cantidad de transacciones'
                }
              }
            }
          };

          const ctx_ct = document.getElementById('myChart_ct');
          document.getElementById('myChart_ct').style.display = "block";
          const myChart_ct = new Chart(ctx_ct, config_ct);

        }
      }
    });

  };

  $.fn.count_method_sale = function () {

    $.ajax({
      url: relative_path + "/ajax-count-method-sale",
      type: "POST",
      data: {
      },
      success: function (response) {
        if (response) {
          console.log('Call count method sale');
          var data = JSON.parse(response);
          var totales = 0;

          // Transacciones por metodo de pago
          const data_tmp = {
            labels: data['labels'],
            datasets: [
              {
                label: 'Dataset tmp',
                data: data['data'],
                backgroundColor: [
                  'rgba(0, 212, 66, 0.8)',
                  'rgba(153, 102, 255, 0.8)'
                ],
              }
            ]
          };

          const config_tmp = {
            type: 'pie',
            data: data_tmp,
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: 'top'
                },
                title: {
                  display: false,
                  text: 'Transacciones por metodo de pago'
                }
              }
            },
          };

          const ctx_tmp = document.getElementById('myChart_tmp');
          document.getElementById('myChart_tmp').style.display = "block";
          const myChart_tmp = new Chart(ctx_tmp, config_tmp);

        }
      }
    });

  };

  $.fn.amount_transactions = function () {

    $.ajax({
      url: relative_path + "/ajax-amount-transactions",
      type: "POST",
      data: {
      },
      success: function (response) {
        if (response) {
          console.log('Call amount transactions');
          var data = JSON.parse(response);
          var totales = 0;

          // Amount transactions
          const data_mt = {
            labels: data['label'],
            datasets: data['datasets']
          };

          const config_mt = {
            type: 'bar',
            data: data_mt,
            options: {
              scales: {
                y: {
                  max: 30000,
                  min: 0,
                  ticks: {
                    min: 0, //minimum tick
                    max: 100000, //maximum tick
                    callback: function (value, index, values) {
                      return Number((value / 1000).toString()) + 'K'; //pass tick values as a string into Number function
                    }
                    //stepSize: 2000
                  }
                }
              },
              responsive: true,
              plugins: {
                tooltip: {
                  callbacks: {
                    label: function (context) {
                      let label = context.dataset.label || '';

                      if (label) {
                        label += ': ';
                      }
                      if (context.parsed.y !== null) {
                        //label += new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(context.parsed.y);
                        var sum = Number(context.parsed.y);
                        if (sum < 1000) {
                          label += sum;
                        } else {
                          label += (sum / 1000).toFixed(1) + 'K';
                        }
                      }
                      return label;
                    }
                  }
                }
              }
            }
          };

          const ctx_mt = document.getElementById('myChart_mt');
          document.getElementById('myChart_mt').style.display = "block";
          const myChart_mt = new Chart(ctx_mt, config_mt);

        }
      }
    });

  };

  $.fn.resumenBars();
  $.fn.transactions_by_card_type();
  $.fn.transactions_by_card_brand();
  $.fn.count_transactions();
  $.fn.count_method_sale();
  $.fn.amount_transactions();
  
  $('#transaction_date').daterangepicker({
    autoUpdateInput: true,
    opens: "left",
    locale: {
      cancelLabel: 'Clear',
      format: 'DD/MM/YYYY'
    }
  });


});