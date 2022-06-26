(function ($) {
  'use strict';
  $(function () {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var data = Array();

    $('#transactions_table thead tr').clone(true).appendTo('#transactions_table thead');
    $('#transactions_table thead tr:eq(1) th').each(function (i) {
        var title = $(this).text();
        if (title === 'customer_id') {
          $(this).html('<input type="text" id="' + title + '" placeholder="" style="width:50px" />');
        } else if (title === 'accion') {
          $(this).html('');
        } else {
          $(this).html('<input type="text" id="' + title + '" placeholder="" />');
        }

        if (title === 'transaction_date') {
          $('#transaction_date').daterangepicker({
            autoUpdateInput: true,
            opens: "left",
            locale: {
              cancelLabel: 'Clear',
              format: 'DD/MM/YYYY'
            }
          });
          
          //filter with datarangepicker
          $("#transaction_date").on('apply.daterangepicker', function (ev, picker) {
            ev.preventDefault();
            var dataIdx = i;
            console.log('ColIdx:' + i);
            //if blank date option was selected
            var val = picker.startDate.format('DD/MM/YYYY');
            console.log("startDate=" + picker.startDate.format('DD/MM/YYYY'));
            console.log("endDate=" + picker.endDate.format('DD/MM/YYYY'));
            var reges= val ? "^" + val + "$" : "^" + "-" + "$";
            console.log('reges='+reges);
            table.columns(i).search(picker.startDate.format('MM/DD/YYYY')+' - '+picker.endDate.format('MM/DD/YYYY')).draw();
          });

        } else {

          $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
              table
                      .column(i)
                      .search(this.value)
                      .draw();
            }
          });
        }
    });
    
//    $('.daterange').on('apply.daterangepicker', function(ev, picker) {
//      console.log(picker.startDate.format('DD-MM-YYYY'));
//      console.log(picker.endDate.format('DD-MM-YYYY'));
//      
//      
//    });

    var table = $('#transactions_table').DataTable({
      initComplete: function () {
        this.api().columns().every(function (colIdx) {
          var column = this;
          //console.log($(column.header()).closest('tr'));
          //console.log($(column.header()).attr('class').indexOf('description') !== -1); // true
          if (colIdx == 14) {
            //console.log($("thead tr:nth-child(2)").find('.description'));
            $(".dataTables_scrollHead thead tr:nth-child(2)").find('.description').html('');
            var select = $('<select><option value="">Select</option></select>')
                    .appendTo($(".dataTables_scrollHead thead tr:nth-child(2)").find('.description'))
                    .on('change', function () {
                      var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                              );

                      column
                              .search(val)
                              //.search(val ? '^' + val + '$' : '', true, false)
                              .draw();
                    });
            column.data().unique().sort().each(function (d, j) {
              select.append('<option value="' + d + '">' + d + '</option>')
            });
          }
        });
      },
      orderCellsTop: true,
      paging: true,
      processing: true,
      cache: false,
      deferRender: true,
      scrollX: true,
      scrollCollapse: true,
      serverSide: true,
      ajax: {
        url: relative_path + "/ajax-transactions-get-all",
        type: 'POST',
        //contentType: "application/json",
        //dataSrc: '',
        data: function(d){
//                    d.fechaIni = $('.date_ini').val() ;
//                    d.fechaFin = $('.date_fin').val() ;
                    d.offSet = 0 ;
                    d.cantidad = 10 ;
                }
      },
      colReorder: true,
      "columnDefs": [{
          "targets": 0,
          "orderable": false
        },
//      {targets:20, render:function(data){
//            return moment(data).format('DD/MM/YYYY HH:MM:SS');
//          }}
      ],
      "order": [[4, "desc"]],
      columns: [
        {"data": "Accion", title: "Acción",
          "render": function (data, type, row) {
            return '<a href="/transactions/details" data-toggle="modal" data-target="#transactionModal" data-id="' + row.reference_code + '"><i class="material-icons">zoom_in</i></a>';
          }
        },
        {data: 'customer_id', title: 'N°', searchable: true},
        {data: 'serial', title: "Serial", searchable: true},
        {data: 'terminal_id', title: "Terminal ID", searchable: true},
        {data: 'merchant_id', title: "Merchant ID", searchable: true},
        {data: 'reference', title: "Referencia Bancaria", searchable: true},
        {data: 'uuid',
          render: function (data, type, row) {
            return data;
          }, searchable: true},
        {data: 'ip_client', title:"Ip",searchable: true},
        {data: 'card_number', title:"Tarjeta", searchable: true},
        {data: 'card_holdername', title:"Cuentahabiente",searchable: true},
        {data: 'approved_code', title: "Código de Autorización", searchable: true},
        {data: 'process_code', title:"Código Proceso",searchable: true},
        {data: 'reference_code', title: "Referencia 2", searchable: true},
        {data: 'result_code', title:"Resultado", searchable: true},
        {data: 'description', title:"Descripción", searchable: true},
        {data: 'total_amount', title:"Monto",searchable: true},
        {data: 'total_received', title:"Total recibido", searchable: true},
        {data: 'currency', title:"Moneda" ,searchable: true},
        {data: 'email', title:"Email", searchable: true},
        {data: 'phone_number', title:"Teléfono", searchable: true},
        {data: 'transaction_date',title: "Fecha transacción", searchable: true, type: "date"},
        {data: 'approved_date', title: "Fecha aprobación", searchable: true},
        {data: 'token_id', title: "Token ID", searchable: true},
        {data: 'latitude', title: "Latitud", searchable: true},
        {data: 'longitude', title: "Longitud", searchable: true},
        {data: 'type_tran_id', title:"Transacción", searchable: true},
      ],
      dom: '<"row" <"col-sm-12" Btr > >  <"sleft" l i ><"sright" p >',
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
        processing: "Procesando...",
        //search:         "Buscar:",
        lengthMenu: "Mostrar _MENU_ transacciones",
        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ transacciones",
        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 transacciones",
        infoFiltered: "(filtrado de un total de _MAX_ transacciones)",
        infoPostFix: "",
        loadingRecords: "Cargando...",
        zeroRecords: "No se encontraron resultados",
        emptyTable: "Ningún dato disponible en esta tabla",
        paginate: {
          first: "Primero",
          previous: "Anterior",
          next: "Siguiente",
          last: "Último"
        },
        aria: {
          sortAscending: ": activar para ordenar la columna de manera ascendente",
          sortDescending: ": activar para ordenar la columna de manera descendente"
        }
      },
      buttons: [
        {
          extend: 'excel',
          title: 'Transacciones',
          messageTop: 'La información de esta tabla es propiedad de GlobalConnection.',
          filename: function () {
            var d = new Date();
            var n = d.getTime();
            return 'Transacciones' + n;
          },
          exportOptions: {
            columns: [12, 1, 2, 3, 4, 5, 6]
          }
        }
      ]
    });

    $('#transactionModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var id = button.data('id');

      var modal = $(this);
      modal.data('id', id);
      modal.find('.modal-title').text(modal.find('.modal-title').text().replace('#_#', id));
      

    });

    $('#transactionModal').on('hidden.bs.modal', function (e) {
      var modal = $(e.target);
      var id = modal.data('id');
      modal.find('.modal-title').text(modal.find('.modal-title').text().replace(id,'#_#'));
      console.log(id);
      console.log('hidden');
    });

    $('.card .material-datatables label').addClass('form-group');
    $("div.filter").appendTo($("div.toolbar"));

    $('#transactions_table tbody').on('click', 'tr', function () {
      if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
      } else {
        table.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
      }

    });

    function currencyFormat(num) {
      return 'Bs ' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }


    $(document).on('click', '.call_send_operation', function (e) {
      console.log('ajax call reload table');
      table.ajax.reload();
    });
    
    /*$(document).on('click', '#liga_ganerate', function (e) {
      console.log('GENERATE LINK');
      var form=$("#generarLiga");
      
      $.ajax({
          url: "/transactions/generate-token",
          type: "POST",
          data: form.serialize(),
          success: function (response) {

              //if (response) {
                  $('#Token').val(response)
              //}

          },
          error: function (response) {
              console.log(response);
          }
      });
    });*/

//    table.on('draw', function () {
//      $('#transaction_date').daterangepicker();
//    });

    $(document).ready(function () {
      //table.colReorder.move( 19, 1 );
      //table.colReorder.move( 3, 2 );
      //table.colReorder.move( 14, 2 );
    });

  });
})(jQuery);