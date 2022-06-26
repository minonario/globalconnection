@extends('layouts.app', ['activePage' => 'applications.urlpayment', 'titlePage' => __('Link de Cobro')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
        <div class="card tables">
          <div class="card-header card-header-icon-ds8 card-header-primary">
            <i class="material-icons">storage</i>
          </div>
          <div class="card-body">
            <h4 class="card-title">Link de Cobro</h4>

            <div class="row" style="margin-top: 20px;">
              <div class="col-lg-4" style="text-align: -webkit-center;">
                  <a href="#" class="link1" tabindex="0" aria-controls="urlpayments_table" type="button" data-toggle="modal" data-target="#createUrlPaymentModal"><img src="{{ asset('material') }}/img/give-money-2.png" style="max-width: 87px; cursor: pointer;" /></a>
              </div>
              <div class="col-lg-4" style="text-align: -webkit-center;">
                  <a href="#" class="link1" tabindex="0" type="button" data-toggle="modal" data-target="#createLinkLoteModal"><img src="{{ asset('material') }}/img/cost.png" style="max-width: 87px; cursor: pointer;" /></a>
              </div>
              <div class="col-lg-4" style="text-align: -webkit-center;">
                  <a href="#" class="link1" tabindex="0" type="button" data-toggle="modal" data-target="#zelleModal"><img src="{{ asset('material') }}/img/zelle-2.png" style="max-width: 87px; cursor: pointer;" /></a>
              </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
              <div class="col-lg-4" style="text-align: -webkit-center;">
                <a href="#" class="linktext" tabindex="0" data-toggle="modal" data-target="#createUrlPaymentModal">Link de cobro manual con TDC</a>
              </div>
              <div class="col-lg-4" style="text-align: -webkit-center;">
                <a href="#" class="linktext" tabindex="0" data-toggle="modal" data-target="#createLinkLoteModal">Link de cobro por lote con TDC</a>
              </div>
              <div class="col-lg-4" style="text-align: -webkit-center;">
                <a href="#" class="linktext" tabindex="0" data-toggle="modal" data-target="#zelleModal">Cobro por Zelle</a>
              </div>
            </div>


            <div class="table-responsive">
              <table class="table" id="urlpayments_table" style="position: relative; white-space: nowrap">
                <thead class=" text-primary">
                  <tr>
                    <th>accion</th>
                    <th>id</th>
                    <th>date_ini</th>
                    <th>date_transaction</th>
                    <th>transaction</th>
                    <th>result</th>
                    <th>reference_code</th>
                    <th>total</th>
                    <th>reference2</th>
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

<!-- Modal -->
<div class="modal fade" id="createUrlPaymentModal" tabindex="-1" role="dialog" aria-labelledby="createUrlPaymentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUrlPaymentModalLabel">Nuevo link de cobro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul class="nav nav-tabs" id='myTab'>
          <li class="nav-item">
              <a class="nav-link active" id="userdata-tab" data-toggle="tab" href="#userdata" role="tab" aria-controls="userdata" aria-selected="true">Datos de cobro</a>
          </li>
        </ul>
        <div class="tab-content" id='myTabContent'>
          <form id="generarLiga" method="POST" action="/transactions/generate-token">
          <div class="tab-pane cuselect fade show active" id="userdata" role="tabpanel" aria-labelledby="userdata-tab">


            <div class="row" style="margin-top: 30px;padding: 0px 78px 36px 100px;">

              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Email del Cliente</label>
                  <input type="text" class="form-control" name="userEmail" id="userEmail" required>
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Monto</label>
                  <input type="text" class="form-control" maxlength="100" id="Amount" name="Amount" required>
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Referencia</label>
                  <input type="text" class="form-control" maxlength="100" id="reference1" name="reference1" required>
                  <span class="material-input"></span>
                </div>
              </div>
               <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Referencia 2</label>
                  <input type="text" class="form-control" maxlength="100" id="reference2" name="reference2" required>
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Comercio afiliado</label>
                  <select class="selectpicker show-tick" name="UserType" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option >Seleccione...</option>
                    <option value="2">Agregador</option>
                    <option value="4">Comercio</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
              <div class="col-lg-8 offset-2" style="text-align: center;">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <!--<button type="button" id="liga_ganerate" class="btn">Generar Link</button>-->
                  <button type="submit" id="liga_ganerate" class="btn btn-fill btn-global">Generar Link</button>
                </div>
              </div>

              <div class="col-lg-8 offset-2">
                <div style="    position: relative; top: 23px; text-align: -webkit-left; width: 100%;">
                  <div class="div_copiar d-none d-sm-block" id="div_copiar" style="cursor:pointer">copiar</div>
                  <textarea name="gapaymenturl" id="Token" rows="2" cols="20" readonly="readonly" id="ligapaymenturl" class="textarea_tokenapi" style="width: 100%;"></textarea>
                  <span style="position: relative; top: -10px; font-size: small; color: red; font-weight: 600; display:none" id="req_liga">Link Requerido</span>
                </div>
              </div>
            </div>

          </div> <!-- tab panel -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          </form>
        </div> <!-- tab content -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a class="btn btn-primary" href="{{ route('transactions.paymentgateway') }}">Enviar solicitud de cobro</a>
      </div>
    </div>
    <!-- tabs transactions details -->

  </div>
</div>

<!-- Modal Link de cobro por lote con TDC -->
<div class="modal fade" id="createLinkLoteModal" tabindex="-1" role="dialog" aria-labelledby="createLinkLoteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createLinkLoteModalLabel">Nuevo Archivo de Ligas de cobro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul class="nav nav-tabs" id='myTab2'>
          <li class="nav-item">
              <a class="nav-link active" id="userdata-tab2" data-toggle="tab" href="#userdata2" role="tab" aria-controls="userdata2" aria-selected="true">Archivo</a>
          </li>
        </ul>
        <div class="tab-content" id='myTabContent2'>
          <div class="tab-pane cuselect extselect fade show active" id="userdata2" role="tabpanel" aria-labelledby="userdata-tab2">


            <div class="row" style="margin-top: 30px;padding: 0px 78px 36px 100px;">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Comercio afiliado</label>
                  <select class="selectpicker show-tick" name="comercioAfi" style="width: 100%" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                    <option value="2">Agregador</option>
                    <option value="4">Comercio</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>

              <div class="col-lg-8 offset-2">
                <!--<p>Seleccione archivo para cargar</p>-->

                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <!--<div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 50px;"></div>-->
                  <div>
                    <span class="btn btn-outline-secondary btn-file" style="width: 100%">
                      <span class="fileinput-new">Seleccione Archivo</span>
                      <span class="fileinput-exists">Cambiar</span>
                      <input type="file" required name="logo_file">
                    </span>
                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remover</a>
                  </div>
                </div>
              </div>

              </div>

            <div class="row">
              <div class="col-lg-8 offset-2" style="text-align: center;">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <button type="button" class="btn">Procesar</button>
                </div>
              </div>
            </div>

              <div class="row">
                <div class="col-lg-6" style="text-align: right">
                  <div class="form-group label-floating is-empty bmd-form-group is-filled">
                    <button type="button" class="btn">Enviar Correos</button>
                  </div>
                </div>
                <div class="col-lg-6" style="text-align: left">
                  <div class="form-group label-floating is-empty bmd-form-group is-filled">
                    <button type="button" class="btn">Descargar Archivo</button>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <!--<div class="separator" id="linea_instrucciones" style="cursor:pointer;font-weight: 600;"><b>Instrucciones<img style="margin-left: 5px;" src="{{ asset('material') }}/img/angle-arrow-down.png"></b></div>-->
                <a style="color:#000;" class="separator" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Instrucciones<img style="margin-left: 5px;" src="{{ asset('material') }}/img/angle-arrow-down.png"></a>
                <div class="collapse" id="collapseExample">
                  <h2 style="font-size: 17px;font-weight: 700;">Cargue el archivo con los datos de cobro con las siguientes características:</h2>
                  <ul style="margin-left: 20px;font-size: 14px;">
                    <li style="margin-bottom: 5px;">
                      * El archivo debe ser en formato de .csv (Descargue un ejemplo <label id="descargaejemplo" style="display: inline-block;cursor:pointer"><b>Aquí</b></label>)
                    </li>
                    <li style="margin-bottom: 5px;">
                      * Debe tener 4 columnas con el siguiente encabezado: <br>
                      <ul style="margin-left: 20px;font-size: 14px;">
                        <li>
                          Columna A1 con nombre Email (Longitud máxima 200 caracteres).
                        </li>
                        <li>
                          Columna B1 con nombre Monto (Ejemplo 150.50).
                        </li>
                        <li>
                          Columna C1 con nombre Referencia (esta columna indica la referencia proporcionada al cliente) (Longitud máxima 50 caracteres).
                        </li>
                        <li>
                          Columna D1 con nombre Referencia2 (esta columna es de referencia interna para control. Ejemplo nombre del comercio) (Longitud máxima 200 caracteres).
                        </li>
                      </ul>
                    </li>
                    <li style="margin-bottom: 5px;">
                      * Si desea enviar el correo con la liga de cobro a los destinatarios, debe presionar el botón "Enviar correos".
                    </li>
                    <li style="margin-bottom: 5px;">
                      * Podra descargar un archivo de excel con las Ligas generadas y/o ver los resultados en la grilla.
                    </li>
                    <li style="margin-bottom: 5px;">
                      * El máximo de Links que podrá generar por archivo es de 100.
                    </li>
                  </ul>
                </div>
              </div>
<!--            </div>-->

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

<!-- Modal Zell -->
<div class="modal fade" id="zelleModal" tabindex="-1" role="dialog" aria-labelledby="zelleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="zelleModalLabel">Nuevo cobro por Zelle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul class="nav nav-tabs" id='myTab3'>
          <li class="nav-item">
              <a class="nav-link active" id="userdata-tab2" data-toggle="tab" href="#userdata3" role="tab" aria-controls="userdata3" aria-selected="true">Datos de cobro</a>
          </li>
        </ul>
        <div class="tab-content" id='myTabContent2'>
          <div class="tab-pane cuselect extselect fade show active" id="userdata2" role="tabpanel" aria-labelledby="userdata-tab2">


            <div class="row" style="margin-top: 30px;padding: 0px 78px 36px 100px;">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Comercio afiliado</label>
                  <select class="selectpicker show-tick" name="comercioAfi" style="width: 100%" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                    <option value="2">Agregador</option>
                    <option value="4">Comercio</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>

              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Email del Cliente</label>
                  <input type="text" class="form-control" name="userEmail">
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Monto</label>
                  <input type="text" class="form-control" maxlength="100" type="text" id="Name" name="Name">
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Referencia</label>
                  <input type="text" class="form-control" maxlength="100" type="text" id="Lastname" name="Lastname">
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Referencia 2</label>
                  <input type="text" class="form-control" maxlength="100" type="text" id="Lastname" name="Lastname">
                  <span class="material-input"></span>
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

  $.validator.setDefaults({ ignore: '' });
   
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.validator.addMethod( "notEqualTo", function( value, element, param ) {
            return this.optional( element ) || !$.validator.methods.equalTo.call( this, value, element, param );
    }, "Ingrese un valor diferente, los valores no deben ser iguales." );
    $.validator.addMethod("currency", function (value, element) {
            return this.optional(element) || /^\d{0,9}(\.\d{0,2})?$/.test(value);
    }, "Por favor, especifique una cantidad válida");
    

    $("#generarLiga").validate({
      rules: {
          userEmail: {
              required: true,
              email: true
          },
          Amount: {
              required: true,
              currency: true
          },
          reference1: {
              required: true,
              maxlength: 50
          },
          reference2: {
              required: true,
              maxlength: 50,
              notEqualTo: "#reference1"
          }
      },
      messages: {
          reference1: {
              required: "Este campo es obligatorio."
          },
          reference2: {
              required: "Este campo es obligatorio."
          }
      },
      submitHandler: function (form) {
        // do other things for a valid form
        //form.submit();
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
      }
    });

    var data = Array();

    $('#urlpayments_table thead tr').clone(true).appendTo('#urlpayments_table thead');
    $('#urlpayments_table thead tr:eq(1) th').each(function (i) {
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

    var table = $('#urlpayments_table').DataTable({
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
        url: relative_path + "/ajax-urlpayments-get-all",
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
            return '<a href="#" data-toggle="modal" data-target="#urlpaymentModal" data-id="' + row.reference_code + '"><i class="material-icons">zoom_in</i></a>';
          }
        },
        {data: 'id', title:"N°", searchable: true},
        {data: 'date_ini', title:"Fecha inicio", searchable: true, type: "date"},
        {data: 'date_transaction', title:"Fecha transacción", searchable: true},
        {data: 'transaction', title:"Transacción", searchable: true},
        {data: 'result', title:"Resultado" ,searchable: true},
        {data: 'reference_code', title:"Referencia", searchable: true},
        {data: 'total', title: "Monto", searchable: true},
        {data: 'reference2', title:"Referencia 2",searchable: true}
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
          title: 'Transacciones Link de Cobro',
          messageTop: 'La información de esta tabla es propiedad de GlobalConnection.',
          filename: function () {
            var d = new Date();
            var n = d.getTime();
            return 'LinkDeCobro' + n;
          },
          exportOptions: {
            columns: [1, 2, 3, 4, 5, 6]
          }
        },
        /*{
          text: function (dt, button, config) {
            console.log(dt);
            button.prepend('<i class="material-icons">person_add</i>');
            button.attr("data-toggle", "modal");
            button.attr("data-target", "#createUrlPaymentModal");
            return dt.i18n('buttons.new', ' Link de Cobro');
          },
          className: "purple",
          action: function (e, dt, node, config) {

          }
        }*/
      ]
    });

  });

</script>

@endpush
