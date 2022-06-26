(function ($) {
    'use strict';
    $(function () {
        
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var data = Array();
        
        // Setup - add a text input to each footer cell
        
        $('#customers_table thead tr').clone(true).appendTo('#customers_table thead');
        $('#customers_table thead tr:eq(1) th').each(function (i) {
            var title = $(this).text();
            
            if (title === 'Logo' || title === 'Accion') {
              if (title === 'Accion'){
                $(this).html('comandos &nbsp;');
              }else{
                $(this).addClass('getspace');
                $(this).html('&nbsp;<b style="color:#000">Logotipo</b>');
              }
            }else{
              $(this).html('<input type="text" id="' + title + '" placeholder="" />');
            }
            
            if (title === 'transaction_date') {
              $('#transaction_date').daterangepicker();
            }else{

              $('input', this).on('keyup change', function () {
                  console.log('transaction keyup change::'+this.value+' collumn='+i);
                  if (table.column(i).search() !== this.value) {
                      table
                              .column(i)
                              .search(this.value)
                              .draw();
                  }
              });
            }
        });

        var table = $('#customers_table').DataTable({
            dom: '<"toolbar">BPrt  <"sleft" l ><"sright" p >',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
                processing:     "Procesando...",
                //search:         "Buscar:",
                lengthMenu:     "Mostrar _MENU_ clientes",
                info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ clientes",
                infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 clientes",
                infoFiltered:   "(filtrado de un total de _MAX_ clientes)",
                infoPostFix:    "",
                loadingRecords: "Cargando...",
                zeroRecords:    "No se encontraron resultados",
                emptyTable:     "Ningún dato disponible en esta tabla",
                paginate: {
                    first:      "Primero",
                    previous:   "Anterior",
                    next:       "Siguiente",
                    last:       "Último"
                },
                aria: {
                    sortAscending:  ": activar para ordenar la columna de manera ascendente",
                    sortDescending: ": activar para ordenar la columna de manera descendente"
                }
            },
            "columnDefs": [ {
            "targets": [0, 2],
            "orderable": false
            } ],
            order: [[ 1, "desc" ]],
            buttons: [
                {
                    extend: 'excel',
                    title: 'Clientes',
                    messageTop: 'La información de esta tabla es propiedad de GlobalConnection.',
                    filename: function(){
                        var d = new Date();
                        var n = d.getTime();
                        return 'Clientes' + n;
                    },
                    exportOptions: {
                        columns: [ 1, 3, 4, 5, 6, 7, 8, 9 ]
                    }
                }
            ],
            orderCellsTop: true,
            paging: true,
            processing: true,
            cache: false,
            //deferRender: true,
            scrollX: true,
            scrollCollapse: true,
            serverSide: false,
            ajax: {
                url: relative_path+"/ajax-customers-get-all",
                type: 'POST',
                //contentType: "application/json",
                dataSrc: ''
            },
            columns: [
                {"data": "Accion", title: "",
                    "render": function (data, type, row) {
                            return '<a href="/customers/edit"><i class="material-icons">edit</i></a>';
                    }
                },
                {data: 'CodigoInterno', title: 'Código Interno' },
                {data: 'Logo', title: '', className: 'deletecontent'},
                {data: 'NombreComercio', title: 'Nombre del Comercio' },
                {data: 'RazonSocial', title: 'Razón Social'},
                {data: 'Estatus', title: 'Estatus'},
                {data: 'Telefono', title: 'Teléfono'},
                {data: 'CodigoPostal', title: 'Código Postal'},
                {data: 'EmailContacto', title: 'Email de contacto'},
                {data: 'UrlTienda', title: 'Url de la tienda'}
            ],
            "drawCallback": function( settings ) {
                //alert( 'DataTables has redrawn the table' );
                $(window).trigger('resize');
            }
        });
        
        $(document).ready(function() {
            $(window).trigger('resize');
        });

        $(window).on('resize', function () {} );

        // Edit record
        table.on( 'click', '.edit', function () {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
        } );

        // Delete a record
        table.on( 'click', '.remove', function (e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        } );

        //Like record
        table.on( 'click', '.like', function () {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
        
        function currencyFormat(num) {
            return 'Bs ' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
        }

        
        $(document).on('click', '.call_send_operation', function(e){
            console.log('ajax call reload table');
            table.ajax.reload();
        });
        
        
        $(document).ready(function() {
          
        });

    });
})(jQuery);