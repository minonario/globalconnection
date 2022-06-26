@extends('layouts.app', ['activePage' => 'users.list', 'titlePage' => __('Usuarios')])

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
            <h4 class="card-title">Usuarios</h4>
            <div class="table-responsive">
              <table class="table table-striped" id="users_table" style="position: relative; white-space:nowrap;">
                <thead class=" text-primary">
                  <tr>
                    <th>Accion</th>
                    <th>UserEmail</th>
                    <th>UserType</th>
                    <th>Commerce</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Status</th>
                    <th>CreatedDate</th>
                    <th>AccessDate</th>
                  </tr>
                </thead>
                <tfoot>

                  </foot>
                <tbody class='table_line_text'>

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
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createUserModalLabel">Alta de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul class="nav nav-tabs" id='myTab'>
          <li class="nav-item">
            <a class="nav-link active" id="userdata-tab" data-toggle="tab" href="#userdata" role="tab" aria-controls="userdata" aria-selected="true">Datos del Usuario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="permissions-tab" data-toggle="tab" href="#permissions" role="tab" aria-controls="permissions" aria-selected="false">Permisos de acceso</a>
          </li>
        </ul>
        <div class="tab-content" id='myTabContent'>
          <div class="tab-pane cuselect fade show active" id="userdata" role="tabpanel" aria-labelledby="userdata-tab">


            <div class="row" style="margin-top: 30px;">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Email</label>
                  <input type="text" class="form-control" name="userEmail">
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Nombre</label>
                  <input type="text" class="form-control" maxlength="100" type="text" id="Name" name="Name">
                  <span class="material-input"></span>
                </div>
              </div>
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating is-empty bmd-form-group is-filled">
                  <label class="control-label bmd-label-static">Apellido Paterno</label>
                  <input type="text" class="form-control" maxlength="100" type="text" id="Lastname" name="Lastname">
                  <span class="material-input"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Tipo de Usuario</label>
                  <select class="selectpicker show-tick" name="UserType" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                    <option value="2">Agregador</option>
                    <option value="4">Comercio</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
            </div>
            <div class="row" style="display: none">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Banco Afiliado</label>
                  <select class="selectpicker show-tick" name="UserType" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                    <option value="1">Credicorp</option>
                    <option value="2">Bancamiga</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
            </div>
            <div class="row" style="display: none">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Agregador Afiliado</label>
                  <select class="selectpicker show-tick" name="UserType" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                    <option value="1">GBC (No usar)</option>
                    <option value="2">Global Connection</option>
                    <option value="5">BANCAMIGA</option>
                    <option value="6">GBC Bancamiga</option>
                    <option value="7">GBC Credicorp</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
            </div>

            <div class="row" style="display: none">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Comercio Afiliado</label>
                  <select class="selectpicker show-tick" name="UserType" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                    <option value="2">AVIOR PLUS</option>
                    <option value="4">Sunset Roll 13085</option>
                    <option value="5">DEMO GLOBAL PROD</option>
                    <option value="19">DEMO GLOBAL (Sandbox)</option>
                    <option value="26">AC Buena Voluntad</option>
                    <option value="27">buyourcard</option>
                    <option value="29">Fundasitio</option>
                    <option value="30">TECNORED SOLUCIONES </option>
                    <option value="31">Decoraciones Garlus</option>
                    <option value="61">PRUEBA BANCAMIGA</option>
                    <option value="62">INVERSIONES AAG 2010 CA</option>
                    <option value="68">CENTRO DESARROLLO VENEZUELA</option>
                    <option value="70">DUNCAN</option>
                    <option value="71">PROGRAMA MATRIX S A </option>
                    <option value="72">Marketing Torina</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
            </div>

            <div class="row" style="display: none">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Sucursal</label>
                  <select class="selectpicker show-tick" name="Sucursal" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
            </div>

            <div class="row" style="display: none">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Terminal</label>
                  <select class="selectpicker show-tick" name="Terminal" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8 offset-2">
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Estatus</label>
                  <select class="selectpicker show-tick" name="Estatus" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                    <option value="">Seleccione...</option>
                    <option value="2">Reseteo</option>
                    <option value="3">Bloqueado</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
            </div>

          </div> <!-- tab panel -->
          <div class="tab-pane fade" id="permissions" role="tabpanel" aria-labelledby="permissions-tab">

            <div class="row" style="margin-top: 30px">
              <div class="col-lg-12" style="text-align: center;text-align: -webkit-center;font-weight: 600;">
                <strong>Seleccione los permisos</strong>
              </div>
            </div>
            <div class="row" style="margin-top: 30px">
              <div class="col-lg-8 offset-2">
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="exampleRadios" value="option1" checked=""> Acceso a Producción
                    <span class="circle">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="exampleRadios" value="option2" checked=""> Acceso a Sandbox
                    <span class="circle">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-8 offset-2">
                <hr style="width:100%">
              </div>
            </div>

            <style>
              .custom .form-check-label {
                margin-right: 14px;
              }
              .custom .form-check {
                display: flex;
              }
              .left15 {
                margin-left: 15px;
              }
            </style>

            <div class="row custom cuselect">
              <div class="col-lg-8 offset-2">
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="1"> Dashboard
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <span style="font-weight: bold; margin: 8px 0; display: block;">Transacciones</span>
                <div class="form-check left15">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="2"> Reportes
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check left15">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="3"> Cierre Díario
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="col-lg-8 offset-2 ">
                <div class="form-check left15">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="4"> Administración
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check left15" style="margin-bottom: 15px;">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="5"> Liquidaciones 
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check ">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="5"> Clientes 
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check ">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="5"> Mi Cuenta 
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check ">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="5"> RiskScore
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check ">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="5"> Configuración
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                <div class="form-check ">
                  <label class="form-check-label">
                    <input class="form-check-input" name="permission[]" type="checkbox" value="5"> Aplicaciones
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
                
                <hr style="width:100%">
                
                <div class="form-group label-floating xu is-empty">
                  <label class="control-label">Tipo de Vista</label>
                  <select class="selectpicker show-tick" name="typeview" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                      <option value="">Seleccione...</option>
                      <option value="1">Crear y editar</option>
                      <option value="2">Consulta</option>
                  </select>
                  <span class="material-input"></span></div>
              </div>
            </div> <!-- row -->
          </div><!-- tab panel -->
        </div> <!-- tab content -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
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

    // Setup - add a text input to each footer cell

    $('#users_table thead tr').clone(true).appendTo('#users_table thead');
    $('#users_table thead tr:eq(1) th').each(function (i) {
      var title = $(this).text();

      //console.log(title);

      if (title === 'Logo' || title === 'Accion') {
        if (title === 'Accion') {
          $(this).html('&nbsp;');
        } else {
          $(this).html('Logotipo');
          //$(this).html('&nbsp;');
        }
      } else {
        $(this).html('<input type="text" id="' + title + '" placeholder="" />');
      }

      if (title === 'transaction_date') {
        $('#transaction_date').daterangepicker();
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

    var table = $('#users_table').DataTable({
      dom: '<"toolbar">BPrt  <"sleft" l ><"sright" p >',
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search records",
        processing: "Procesando...",
        //search:         "Buscar:",
        lengthMenu: "Mostrar _MENU_ usuarios",
        info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ usuarios",
        infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 usuarios",
        infoFiltered: "(filtrado de un total de _MAX_ usuarios)",
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
      "columnDefs": [{
          "targets": 2,
          "orderable": false
        }],
      buttons: [
        {
          extend: 'excel',
          title: 'Usuarios',
          messageTop: 'La información de esta tabla es propiedad de GlobalConnection.',
          filename: function () {
            var d = new Date();
            var n = d.getTime();
            return 'Usuarios' + n;
          },
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6]
          }
        },
        {
          text: function (dt, button, config) {
            console.log(dt);
            button.prepend('<i class="material-icons">person_add</i>');
            button.attr("data-toggle", "modal");
            button.attr("data-target", "#createUserModal");
            return dt.i18n('buttons.new', ' Nuevo Usuario');
          },
          className: "purple",
          action: function (e, dt, node, config) {

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
        url: relative_path + "/ajax-users-get-all",
        type: 'POST',
        //contentType: "application/json",
        dataSrc: ''
      },
      columns: [
        {"data": "Accion", title: "Acción",
          "render": function (data, type, row) {
            return '<a href="/users/edit"><i class="material-icons">edit</i></a>';
          }
        },
        {data: 'UserEmail', title: 'Email'},
        {data: 'UserType', title: 'Tipo de Usuario'},
        {data: 'Commerce', title: 'Comercio'},
        {data: 'FirstName', title: 'Nombre'},
        {data: 'LastName', title: 'Apellido'},
        {data: 'Status', title: 'Estatus'},
        {data: 'CreatedDate', title: 'Fecha de Creación'},
        {data: 'AccessDate', title: 'Último Acceso'}
      ]
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

    function currencyFormat(num) {
      return 'Bs ' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }


    $(document).on('click', '.call_send_operation', function (e) {
      console.log('ajax call reload table');
      table.ajax.reload();
    });

  });

</script>

@endpush
