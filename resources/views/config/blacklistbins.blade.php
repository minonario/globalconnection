@extends('layouts.app', ['activePage' => 'config.blacklistbins', 'titlePage' => __('Lista Negra de Bines')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-md-12">
        <div class="card tables">
          <div class="card-header card-header-icon-ds8 card-header-primary">
            <i class="material-icons">supervisor_account</i>
          </div>
          <div class="card-body">
            <h4 class="card-title">Lista Negra de Bines</h4>
            <div class="table-responsive">
              <table class="table table-striped" id="blacklistbins_table" style="position: relative; width: 100%; white-space:nowrap;">
                <thead class=" text-primary">
                  <tr>
                  <th>Accion</th>
                  <th>Bin</th>
                  <th>CreatedDate</th>
                  <th>Usuario</th>
                  <th>Status</th>
                  </tr>
                </thead>
                <tfoot>
                 
                </foot>
                <tbody>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection

@push('js')

<script type="text/javascript">
  
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var data = Array();
        
        // Setup - add a text input to each footer cell
        
        $('#blacklistbins_table thead tr').clone(true).appendTo('#blacklistbins_table thead');
        $('#blacklistbins_table thead tr:eq(1) th').each(function (i) {
            var title = $(this).text();
            
            //console.log(title);
            
            if (title === 'Logo' || title === 'Accion') {
              if (title === 'Accion'){
                $(this).html('&nbsp;');
              }
            }else{
              $(this).html('<input type="text" id="' + title + '" placeholder="" />');
            }
            
            if (title === 'transaction_date') {
              $('#transaction_date').daterangepicker();
            }else{

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

        var table = $('#blacklistbins_table').DataTable({
            dom: '<"toolbar">BPrt  <"sleft" l ><"sright" p >',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
                processing:     "Procesando...",
                //search:         "Buscar:",
                lengthMenu:     "Mostrar _MENU_ registros",
                info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
                infoFiltered:   "(filtrado de un total de _MAX_ registros)",
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
            "targets": 2,
            "orderable": false
            } ],
            buttons: [
                {
                    extend: 'excel',
                    title: 'Lista Negra Bines',
                    messageTop: 'La información de esta tabla es propiedad de GlobalConnection.',
                    filename: function(){
                        var d = new Date();
                        var n = d.getTime();
                        return 'ListaNegraBines' + n;
                    },
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6]
                    }
                }
            ],
            orderCellsTop: true,
            paging: true,
            processing: true,
            cache: false,
            deferRender: true,
            scrollX: true,
            scrollCollapse: true,
            serverSide: false,
            ajax: {
                url: relative_path+"/ajax-blacklistbins-get-all",
                type: 'POST',
                //contentType: "application/json",
                dataSrc: ''
            },
            columns: [
                {"data": "Accion", title: "Acción",
                    "render": function (data, type, row) {
                            return '<a href="#"><i class="material-icons">edit</i></a>';
                    }
                },
                {data: 'Bin', title: 'Bin' },
                {data: 'CreatedDate', title: 'Fecha de Creación'},
                {data: 'Usuario', title: 'Usuario'},
                {data: 'Status', title: 'Estatus'},
            ]
        });
        

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
        
    });

</script>

@endpush
