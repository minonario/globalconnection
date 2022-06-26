@extends('layouts.app', ['activePage' => 'config.whitelistcard', 'titlePage' => __('Lista Blanca de Tarjetas')])

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
            <h4 class="card-title">Lista Blanca de Tarjetas</h4>
            <div class="table-responsive">
              <table class="table table-striped" id="whitelistcard_table" style="position: relative; white-space:nowrap;">
                <thead class=" text-primary">
                  <tr>
                  <th>Accion</th>
                  <th>CardNumber</th>
                  <th>DailyLimit</th>
                  <th>Commerce</th>
                  <th>CreatedDate</th>
                  <th>Usuario</th>
                  <th>status</th>
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
        
        $('#whitelistcard_table thead tr').clone(true).appendTo('#whitelistcard_table thead');
        $('#whitelistcard_table thead tr:eq(1) th').each(function (i) {
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

        var table = $('#whitelistcard_table').DataTable({
            dom: '<"toolbar">Prt  <"sleft" l ><"sright" p >',
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
                processing:     "Procesando...",
                //search:         "Buscar:",
                lengthMenu:     "Mostrando _MENU_ registros por página",
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
            orderCellsTop: true,
            paging: true,
            processing: true,
            cache: false,
            deferRender: true,
            scrollX: true,
            scrollCollapse: true,
            serverSide: false,
            ajax: {
                url: relative_path+"/ajax-whitelistcard-get-all",
                type: 'POST',
                //contentType: "application/json",
                dataSrc: ''
            },
            columns: [
                {"data": "Accion", title: "Acción",
                    "render": function (data, type, row) {
                            return '<a href="/whitelistcard/edit"><i class="material-icons">edit</i></a>';
                    }
                },
                {data: 'CardNumber', title: 'Número de Tarjeta' },
                {data: 'DailyLimit', title: 'Límite Diario'},
                {data: 'Commerce', title: 'Comercio'},
                {data: 'CreatedDate', title: 'Fecha de Creación'},
                {data: 'Usuario', title: 'Usuario'}, // LEYDI - 22-06-2022 modificar nombres
                {data: 'status', title: 'Estatus'}
            ]
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
