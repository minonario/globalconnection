@extends('layouts.app', ['activePage' => 'transactions.clientreport', 'titlePage' => __('Resumen Clientes')])

@section('content')
<div class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats ds8initiated clientreport">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">electric_bike</i>
            </div>
            <p class="card-category">Tarjetas</p>
            <h3 class="card-title">$139,070.85
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <b> 
                  <span id="Cant_approved" style="display: inline;">275</span>
                  <span style="font-size: 14px; position: absolute; top: 0px; right: 0px;" id="porcentaje_approved">39.94%</span>
              </b>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats ds8approved clientreport">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">price_check</i>
            </div>
            <p class="card-category">Zelle</p>
            <h3 class="card-title">$209,119.89</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <b> <span id="Cant_declined" style="display: inline;">804</span> 
                <span style="font-size: 14px; position: absolute; top: 0px; right: 0px;" id="porcentaje_declined">60.06%</span>
              </b>
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
            <p class="card-category">Total General</p>
            <h3 class="card-title">$348,190.74</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <b> <span id="Cant_declined" style="display: inline;">&nbsp;</span>
              </b>
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
            <h4 class="card-title">Resumen Clientes</h4>
            <div class="table-responsive">
              <table class="table" id="clientreport_table" style="width: 100%; position: relative; white-space: nowrap">
                <thead class=" text-primary">
                  <tr>
                    <th>customer</th>
                    <th>total_cards</th>
                    <th>total_zelle</th>
                    <th>total_general</th>
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

  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var data = Array();

    $('#clientreport_table thead tr').clone(true).appendTo('#clientreport_table thead');
    $('#clientreport_table thead tr:eq(1) th').each(function (i) {
      var title = $(this).text();
      if (title === 'customer') {
        $(this).html('<input type="text" id="' + title + '" placeholder="" class="form-controlx" style="width:100%" />');
        $('input', this).on('keyup change', function () {
          if (table.column(i).search() !== this.value) {
            table
                    .column(i)
                    .search(this.value)
                    .draw();
          }
        });
      }else{
        $(this).html("");
      }
    });

//    $('.daterange').on('apply.daterangepicker', function(ev, picker) {
//      console.log(picker.startDate.format('DD-MM-YYYY'));
//      console.log(picker.endDate.format('DD-MM-YYYY'));
//      
//      
//    });

    var table = $('#clientreport_table').DataTable({
      orderCellsTop: true,
      paging: true,
      processing: true,
      cache: false,
      deferRender: true,
      scrollX: true,
      scrollCollapse: true,
      serverSide: false,
      responsive: true,
      ajax: {
        url: relative_path + "/ajax-client-summary-get-all",
        type: 'POST',
        //contentType: "application/json",
        dataSrc: ''
      },
      colReorder: true,
      columns: [
        {data: 'customer', title: "Cliente", searchable: true},
        {data: 'total_cards', title: "Tarjetas", searchable: false},
        {data: 'total_zelle', title: "Zelle", searchable: false},
        {data: 'total_general', title: "Total General",searchable: false}
      ],
      dom: '<"row" <"col-sm-12" Btr > >  <"sleft" l i ><"sright" p >',
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
        processing: "Procesando...",
        //search:         "Buscar:",
        lengthMenu: "Mostrar _MENU_ clientes",
        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ clientes",
        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 clientes",
        infoFiltered: "(filtrado de un total de _MAX_ clientes)",
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
            return 'Resumen Clientes' + n;
          },
          exportOptions: {
            columns: [0, 1, 2, 3]
          }
        }
      ]
    });
    
  });

</script>

@endpush
