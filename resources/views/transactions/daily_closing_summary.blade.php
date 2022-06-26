@extends('layouts.app', ['activePage' => 'transactions.daily_closing_summary', 'titlePage' => __('Cierre Diario Resumen')])

@section('content')
<div class="content">
  <div class="container-fluid">
    
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats ds8initiated">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">money</i>
            </div>
            <p class="card-category">Venta Bruta</p>
            <h3 class="card-title">$447.37
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <h2><span>Transacciones: 5</span></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats ds8approved">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">price_check</i>
            </div>
            <p class="card-category">Comisiones</p>
            <h3 class="card-title">$14.03</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <h2><span>0.00</span></h2>
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
            <p class="card-category">Venta Neta</p>
            <h3 class="card-title">$433.34</h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <h2><span>0.00</span></h2>
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
            <h4 class="card-title">Cierre Diario Resumen</h4>
            <div class="table-responsive">
              <table class="table" id="daily_closing_summary_table" style="position: relative; white-space: nowrap">
                <thead class=" text-primary">
                  <tr>
                    <th>transaction_date</th>
                    <th>customer</th>
                    <th>payment_method</th>
                    <th>currency</th>
                    <th>gross_sales</th>
                    <th>commissions</th>
                    <th>net_sale</th>
                  </tr>
                </thead>
                <tfoot>

                </tfoot>
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

    $('#daily_closing_summary_table thead tr').clone(true).appendTo('#daily_closing_summary_table thead');
    $('#daily_closing_summary_table thead tr:eq(1) th').each(function (i) {
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

    var table = $('#daily_closing_summary_table').DataTable({
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
        url: relative_path + "/ajax-daily-closing-summary-get-all",
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
        {data: 'transaction_date', title:"Fecha", searchable: true},
        {data: 'customer', title:"Cliente", searchable: true},
        {data: 'payment_method', title: "Método de Pago", searchable: true},
        {data: 'currency', title:"Moneda", searchable: true},
        {data: 'gross_sales', title:"Venta Bruta", searchable: true},
        {data: 'commissions', title:"Comisiones" , searchable: true},
        {data: 'net_sale', title: "Venta Neta" ,searchable: true}
      ],
      dom: '<"row" <"col-sm-12" Btr > >  <"sleft" l i ><"sright" p >',
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
        processing: "Procesando...",
        //search:         "Buscar:",
        lengthMenu: "Mostrar _MENU_ cierres",
        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ cierres",
        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 cierres",
        infoFiltered: "(filtrado de un total de _MAX_ cierres)",
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
            return 'Cierres' + n;
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
