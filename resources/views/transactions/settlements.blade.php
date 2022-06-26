@extends('layouts.app', ['activePage' => 'transactions.settlements', 'titlePage' => __('Liquidaciones')])

@section('content')
<div class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats ds8initiated">
          <div class="card-header card-header-warning card-header-icon" style="text-align: center; padding: 20px 0;">
            <a href="#" role="button"tabindex="0"  data-toggle="modal" data-target="#liquidacionesModal">
            <img src="{{ asset('material') }}/img/files-and-folders.png" style="max-width: 50px;" />
            <p class="card-category">Subir archivo de liquidaciones</p>
            </a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats ds8approved">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">price_check</i>
            </div>
            <p class="card-category">VENTA LIQUIDA</p>
            <h3 class="card-title">$361,373.01</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <h2><span></span></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats ds8reject">
          <div class="card-header card-header-danger card-header-icon">
            <div class="card-icon">
              <i class="material-icons">stacked_bar_chart</i>
            </div>
            <p class="card-category">TOTAL LIQUIDADO</p>
            <h3 class="card-title">$345,964.05</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <h2><span></span></h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">

      <div class="col-md-12">
        <div class="card tables">
          <div class="card-header card-header-icon-ds8 card-header-primary">
            <i class="material-icons">storage</i>
          </div>
          <div class="card-body">
            <h4 class="card-title">Liquidaciones</h4>
            <div class="table-responsive">
              <table class="table" id="settlements_table" style="position: relative; white-space: nowrap">
                <thead class=" text-primary">
                  <tr>
                    <th>accion</th>
                    <th>settlement_date</th>
                    <th>currency</th>
                    <th>liquid_sale</th>
                    <th>commissions</th>
                    <th>other</th>
                    <th>total_tax</th>
                    <th>total_settled</th>
                    <th>bank</th>
                    <th>reference_code</th>
                    <th>customer</th>
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

<!-- Modal subir archivo Liquidaciones -->
<div class="modal fade" id="liquidacionesModal" tabindex="-1" role="dialog" aria-labelledby="liquidacionesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="liquidacionesModalLabel">Nuevo Archivo de Liquidaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul class="nav nav-tabs" id='myTab3'>
          <li class="nav-item">
              <a class="nav-link active" id="userdata-tab2" data-toggle="tab" href="#userdata3" role="tab" aria-controls="userdata3" aria-selected="true">Archivo</a>
          </li>
        </ul>
        <div class="tab-content" id='myTabContent2'>
          <div class="tab-pane cuselect extselect fade show active" id="userdata2" role="tabpanel" aria-labelledby="userdata-tab2">


            <div class="row" style="margin-top: 30px;padding: 0px 78px 36px 100px;">
              <div class="col-lg-12 offset-0">
                
                <h4>Seleccione el archivo con los datos para cargar las liquidaciones:</h4>
                <ul>
                  <li>El archivo debe ser en formato de .xlsx o .xls.</li>
                  <li>Al subir el archivo el sistema proporcionará el monto de liquidación el cual debe verificar con el archivo original.</li>
                  <li>Si el monto es el correcto debe presionar "Procesar" para finalizar y el sistema actualizará el estatus de las transacciones.</li>
                </ul>
              </div>
              
              <div class="col-lg-8 offset-2">
                <div style="width:100%;    text-align: center;">
                    <div class="custom-file" style="background-color: #100d2c;">
                         <input type="file" style="position: absolute;    left: 0; cursor:pointer" class="custom-file-input" id="customLiquidations">
                         <label class="custom-file-label" id="labeluploadfile" style="background-color:rgba(0, 30, 34, 0.85);color: white;padding-left: 15px; padding-right: 15px; cursor:pointer" for="customFile">
                         <img style="width: 38px; margin-left: 8px; margin-right: 8px;" src="{{ asset('material') }}/img/upload.png">Seleccione el archivo a cargar</label>
                    </div>
                    <div>
                      <label id="label_archivo_cargado"></label> <br>
                      <label id="loader_liquidaciones_procesar_upload" style="display: none;"><img src="{{ asset('material') }}/img/loader.gif" style="width: 26px;">Verificando...</label>
                      <label id="error_emailbatchfile" style="font-size: 14px;" class="error_1"></label>
                    </div>

                    <button type="button" style="margin-bottom: 15px;" class="btn btn-success" id="finish_file" disabled="">Procesar</button>
                    <label id="success_emailbatchfile"></label>
                     <div class="checkmark" id="check_procesado" style="display: none;">
                       <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                         <path class="path" fill="none" stroke="rgb(157, 174, 45)" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                                 c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                                 c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"></path>
                         <circle class="path" fill="none" stroke="rgb(157, 174, 45)" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"></circle>
                         <polyline class="path" fill="none" stroke="rgb(157, 174, 45)" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8 
                                 74.1,108.4 48.2,86.4 "></polyline>

                         <circle class="spin" fill="none" stroke="rgb(157, 174, 45)" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"></circle>
                       </svg>
                     </div> 
                </div>
              </div>

            </div>
          </div> <!-- tab panel -->
        </div> <!-- tab content -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- tabs transactions details -->
  </div>
</div>


@endsection

@push('js')

<script type="text/javascript">

  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var data = Array();

    $('#settlements_table thead tr').clone(true).appendTo('#settlements_table thead');
    $('#settlements_table thead tr:eq(1) th').each(function (i) {
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

    var table = $('#settlements_table').DataTable({
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
        url: relative_path + "/ajax-settlements-get-all",
        type: 'POST',
        //contentType: "application/json",
        dataSrc: ''
      },
      colReorder: true,
      "columnDefs": [{
          "targets": 0,
          "orderable": false
        }
      ],
      //"order": [[4, "desc"]],
      columns: [
        {"data": "Accion", title: "Acción",
          "render": function (data, type, row) {
            return '<a href="#" data-toggle="modal" data-target="#settlementModal" data-id="' + row.reference_code + '"><i class="material-icons">zoom_in</i></a>';
          }
        },
        {data: 'settlement_date', title:"Fecha Liquidación",searchable: true, type: "date"},
        {data: 'currency', title:"Moneda" ,searchable: true},
        {data: 'liquid_sale', title:"Ventas Liquidas",searchable: true},
        {data: 'commissions', title:"Comisiones", searchable: true},
        {data: 'other', title:"Otros Conceptos", searchable: true},
        {data: 'total_tax', title:"Total Iva" ,searchable: true},
        {data: 'total_settled', title:"Total Liquidado",searchable: true},
        {data: 'bank', title:"Banco", searchable: true},
        {data: 'reference_code', title:"Referencia Bancaria",searchable: true},
        {data: 'customer', title:"Cliente",searchable: true}
      ],
      dom: '<"row" <"col-sm-12" Btr > >  <"sleft" l i ><"sright" p >',
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
        processing: "Procesando...",
        //search:         "Buscar:",
        lengthMenu: "Mostrar _MENU_ liquidaciones",
        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ liquidaciones",
        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 liquidaciones",
        infoFiltered: "(filtrado de un total de _MAX_ liquidaciones)",
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
            return 'Liquidaciones' + n;
          },
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6]
          }
        }
      ]
    });
    
  });

</script>

@endpush
