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
            autoUpdateInput: false,
            opens: "left",
            locale: {
              cancelLabel: 'Clear',
              format: 'DD-MM-YYYY'
            }
          });
          //filter with datarangepicker
          $("#transaction_date").on('apply.daterangepicker', function (ev, picker) {
            ev.preventDefault();
            var dataIdx = i;
            console.log('ColIdx:' + i);
            //if blank date option was selected
            var val = picker.startDate.format('DD-MM-YYYY');
            console.log("startDate=" + picker.startDate.format('DD-MM-YYYY'));
            console.log("endDate=" + picker.endDate.format('DD-MM-YYYY'));
            var reges= val ? "^" + val + "$" : "^" + "-" + "$";
            console.log('reges='+reges);

            table.draw();
            /*table.column(i)
                    .search(val ? "^" + val + "$" : "^" + "-" + "$", true, false, true)
                    .draw();
*/
//            return true;
//            //if blank date option was selected
//            if ((picker.startDate.format('DD-MM-YYYY') == "01-01-0001") && (picker.endDate.format('DD-MM-YYYY')) == "01-01-0001") {
//              $(this).val('Blank');
//              val = "^$";
//              table.column(dataIdx)
//                      .search(val, true, false, true)
//                      .draw();
//            }else{
//              //set field value
//              $(this).val(picker.startDate.format('DD-MM-YYYY') + ' to ' + picker.endDate.format('DD-MM-YYYY'));
//              //run date filter
//              startDate = picker.startDate.format('DD-MM-YYYY');
//              endDate = picker.endDate.format('DD-MM-YYYY');
//
//              var dateStart = startDate; //parseDateValue(startDate);
//              var dateEnd = endDate; //parseDateValue(endDate);
//              var filteredData = table
//                      .column(dataIdx)
//                      .data()
//                      .filter(function (value, index) {
//                        
//                        //console.log('value='+value+' index='+index);
//                        var date = Date.parse(value);
//                        value = moment(date).format('DD-MM-YYYY');
//                        //console.log( moment(date).format('DD-MM-YYYY') ); // June 1, 2019
//                        //console.log('jj'+ (value >= dateStart));
//                        
//                        var evalDate = value === "" ? 0 : value; //parseDateValue(value);
//                        if ( /*(isNaN(dateStart) && isNaN(dateEnd)) ||*/ (evalDate >= dateStart && evalDate <= dateEnd)) {
//                          console.log('truee');
//                          return true;
//                        }
//                        console.log('falssee');
//                        return false;
//                      });
//                      
//              console.log('world:'+filteredData);
//              var val = "";
//              for (var count = 0; count < filteredData.length; count++) {
//                val += filteredData[count] + "|";
//              }
//              val = val.slice(0, -1);
//              table.column(dataIdx)
//                      .search(val ? "^" + val + "$" : "^" + "-" + "$", true, false, true)
//                      .draw();
//            }
          });
          // end filter daterange

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
            
    $.fn.dataTable.ext.search.push(
    function (settings, data, dataIndex) {

        console.log('here');
        var drp = $('#transaction_date').data('daterangepicker');
        console.log('fecha rango:'+drp.endDate.format('DD-MM-YYYY'));
        var valid = true;
        var min = moment(drp.startDate.format('DD-MM-YYYY'));  
        if (!min.isValid()) { min = null; }
        var max = moment(drp.endDate.format('DD-MM-YYYY'));  
        if (!max.isValid()) { max = null; }
        
        console.log('min='+min+" max="+max);
//        console.log('#transaction_date='+$("#transaction_date").val());
//        
//        var valid = true;
//        var min = moment($("#min").val());
//        if (!min.isValid()) { min = null; }
//       // console.log(min);
//
//        var max = moment($("#max").val());
//        if (!max.isValid()) { max = null; }
//
        if (min === null && max === null) {
            // no filter applied or no date columns
            valid = true;
        }
        else {

            $.each(settings.aoColumns, function (i, col) {
                console.log('here2');
                
                if (col.type == "date") {
                    var cDate = moment(data[i],'DD-MM-YYYY');
                    var date = Date.parse(cDate);
                    var value = moment(date).format('DD-MM-YYYY');
                    
                    console.log('here3='+ max.isBefore(cDate));
                
                    if (cDate.isValid()) {
                        if (max !== null && max.isBefore(cDate)) {
                            valid = false;
                        }
                        if (min !== null && cDate.isBefore(min)) {
                            valid = false;
                        }
                    }
                    else {
                        valid = false;
                    }
                }
            });
        }
        return valid;
    });
    
    var startDate;
    var endDate;
    var dataIdx;  //current data column to work with

//
//    $("#transactions_table_wrapper .table.dataTable.no-footer thead").on("mousedown", "th", function (event) {
//        var visIdx = $(this).parent().children().index($(this));
//        dataIdx = table.column.index('fromVisible', visIdx);
//        console.log('TH'+dataIdx);
//    });
    
//    // Function for converting a dd/mmm/yyyy date value into a numeric string for comparison (example 01-Dec-2010 becomes 20101201
//    function parseDateValue(rawDate) {
//
//        var d = moment(rawDate, "DD-MMM-YYYY").format('DD-MM-YYYY');
//        var dateArray = d.split("-");
//        var parsedDate = dateArray[2] + dateArray[1] + dateArray[0];
//        return parsedDate;
//    }
//    //filter on daterange
//    $("#transaction_date").on('apply.daterangepicker', function (ev, picker) {
//        ev.preventDefault();
//        //if blank date option was selected
//        if ((picker.startDate.format('DD-MM-YYYY') == "01-01-0001") && (picker.endDate.format('DD-MM-YYYY')) == "01-01-0001") {
//            $(this).val('Blank');
//            val = "^$";
//            table.column(dataIdx)
//               .search(val, true, false, true)
//               .draw();
//        }
//        else {
//            //set field value
//            $(this).val(picker.startDate.format('DD-MM-YYYY') + ' to ' + picker.endDate.format('DD-MM-YYYY'));
//            //run date filter
//            startDate = picker.startDate.format('DD-MM-YYYY');
//            endDate = picker.endDate.format('DD-MM-YYYY');
//
//            var dateStart = startDate; //parseDateValue(startDate);
//            var dateEnd = endDate; //parseDateValue(endDate);
//            var filteredData = table
//                    .column(dataIdx)
//                    .data()
//                    .filter(function (value, index) {
//                        var evalDate = value === "" ? 0 : value; //parseDateValue(value);
//                        if ((isNaN(dateStart) && isNaN(dateEnd)) || (evalDate >= dateStart && evalDate <= dateEnd)) {
//                            return true;
//                        }
//                        return false;
//                    });
//            var val = "";
//            for (var count = 0; count < filteredData.length; count++) {
//                val += filteredData[count] + "|";
//            }
//            val = val.slice(0, -1);
//            table.column(dataIdx)
//                  .search(val ? "^" + val + "$" : "^" + "-" + "$", true, false, true)
//                  .draw();
//        }
//    });
//
    $("#transaction_date").on('cancel.daterangepicker', function (ev, picker) {
        ev.preventDefault();
        $(this).val('');
        table.column()
              .search("")
              .draw();
    });

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
                              .search(val ? '^' + val + '$' : '', true, false)
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
      serverSide: false,
      ajax: {
        url: relative_path + "/ajax-transactions-get-all",
        type: 'POST',
        //contentType: "application/json",
        dataSrc: ''
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
        {data: 'serial', searchable: true},
        {data: 'terminal_id', searchable: true},
        {data: 'merchant_id', searchable: true},
        {data: 'reference', searchable: true},
        {data: 'uuid',
          render: function (data, type, row) {
            return data;
          }, searchable: true},
        {data: 'ip_client', searchable: true},
        {data: 'card_number', searchable: true},
        {data: 'card_holdername', searchable: true},
        {data: 'approved_code', searchable: true},
        {data: 'process_code', searchable: true},
        {data: 'reference_code', searchable: true},
        {data: 'result_code', searchable: true},
        {data: 'description', searchable: true},
        {data: 'total_amount', searchable: true},
        {data: 'total_received', searchable: true},
        {data: 'currency', searchable: true},
        {data: 'email', searchable: true},
        {data: 'phone_number', searchable: true},
        {data: 'transaction_date', searchable: true},
        {data: 'approved_date', searchable: true, type: "date"},
        {data: 'token_id', searchable: true},
        {data: 'latitude', searchable: true},
        {data: 'longitude', searchable: true},
        {data: 'type_tran_id', searchable: true},
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
          title: 'Clientes',
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

    // Edit record
    table.on('click', '.edit', function () {
      $tr = $(this).closest('tr');

      var data = table.row($tr).data();
      alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function (e) {
      $tr = $(this).closest('tr');
      table.row($tr).remove().draw();
      e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function () {
      alert('You clicked on Like button');
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

    table.on('draw', function () {
      $('#transaction_dates').daterangepicker();
    });

    $(document).ready(function () {
      //table.colReorder.move( 19, 1 );
      //table.colReorder.move( 3, 2 );
      //table.colReorder.move( 14, 2 );
    });

  });
})(jQuery);