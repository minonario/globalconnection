@extends('layouts.app', ['activePage' => 'customers.list', 'titlePage' => __('Clientes')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class='col-lg-12'>
        <div class="card">
          <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="global">
              <h4 class="card-title">Datos del Comercio</h4>
            </div>
            <div class="card-content">
              <div class="row">
                <label class="col-sm-2 label-on-left">Código Interno</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" value="">
                    <span class="help-block">A block of help text that breaks onto a new line.</span>
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Nombre del Comercio</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" value="">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Razón Social</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="placeholder">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Disabled</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" placeholder="Disabled input here..." disabled="" class="form-control">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">RIF</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="placeholder">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Teléfono de Contacto</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="placeholder">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Email de Contacto</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="placeholder">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">País</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <select class="selectpicker show-tick" data-style="select-with-transitionx btn btn-primary"  title="Selecciona país">
                      <option value="">Selecciona</option>
                      <option value="ve">Venezuela</option>
                      <option value="co">Colombia</option>
                      <option value="pe">Peru</option>
                    </select>
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Ciudad</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="placeholder">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Dirección 1</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="placeholder">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Dirección 2</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="placeholder">
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Código Postal</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" placeholder="placeholder">
                    <span class="material-input"></span></div>
                </div>
              </div>



            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class='col-lg-12'>
        <div class="card">
          <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="global">
              <h4 class="card-title">Datos de Afiliación</h4>
            </div>
            <div class="card-content">

              <div class="row">
                <label class="col-sm-2 label-on-left">Agregador</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <select class="selectpicker show-tick" data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                      <option value="">Seleccione...</option>
                       @foreach ($data['aggregator'] as $val)
                            <label>{{$val->Id}}</label>
                            <option value="{{$val->Id}}">{{$val->Title}}</option>
                       @endforeach
                    </select>
                    <span class="material-input"></span></div>
                </div>
              </div>


              <div class="row">
                <label class="col-sm-2 label-on-left">Categoría</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <select class="selectpicker show-tick" data-style="select-with-transition btn btn-primary"  title="Seleccione..">
                      <option value="">Seleccione...</option>
                       @foreach ($data['categories'] as $val)
                            <label>{{$val->Id}}</label>
                            <option value="{{$val->Id}}">{{$val->Title}}</option>
                       @endforeach
                    </select>
                    <span class="material-input"></span></div>
                </div>
              </div>


              <div class="row">
                <label class="col-sm-2 label-on-left">Giro</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <select class="selectpicker show-tick" data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                      <option value="">Seleccione...</option>
                       @foreach ($data['turns'] as $val)
                            <label>{{$val->Id}}</label>
                            <option value="{{$val->Id}}">{{$val->Title}}</option>
                       @endforeach
                    </select>
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left">Procesador de Pago</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <select class="selectpicker show-tick" data-style="select-with-transition btn btn-primary"  title="Selecciona país">
                      <option value="">Selecciona</option>
                      <option value="ve">Venezuela</option>
                      <option value="co">Colombia</option>
                      <option value="pe">Peru</option>
                    </select>
                    <span class="material-input"></span></div>
                </div>
              </div>


            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class='col-lg-12'>
        <div class="card">
          <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="global">
              <h4 class="card-title">Procesador</h4>
            </div>
            <div class="card-content">

              <div class="row">
                <label class="col-sm-2 label-on-left"><strong>CUST_NBR</strong></label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" value="">
                    <span class="help-block">A block of help text that breaks onto a new line.</span>
                    <span class="material-input"></span></div>
                </div>
                <div class="col-sm-10 offset-lg-2">
                  <p>Los datos a continuación deben ser cargados por comercio en caso tener distinta razón social, de lo contrario solo debe cargar un registro. Por favor presione el botón "Nuevo"</p>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-2 label-on-left"><strong></strong></label>

                <div class="col-sm-10 offset-lg-1">
                  <div class="table-responsive">
                    <table class="table table-striped" id="processor_table" style="position: relative;">
                      <thead class=" text-primary">
                        <tr>
                          <th>MERCH_NBR</th>
                          <th>MERCH_NAME</th>
                          <th>DBA_NBR</th>
                          <th>TERMINAL_NBR</th>
                          <th>DESCRIPCION</th>
                          <th>ESTATUS</th>
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
          </form>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class='col-lg-12'>
        <div class="card">
          <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="global">
              <h4 class="card-title">Servicios Contratados</h4>
            </div>
            <div class="card-content">

              <div class="row">


                <div class="col-sm-4 offset-lg-1">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value=""> Gateway de pago (E-Commerce)
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value=""> API Validación Email
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value=""> API AntiFraude Full
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
                <div class="col-sm-4 ">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value=""> Link de Pago
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value=""> API Validación Proxy
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class='col-lg-12'>
        <div class="card">
          <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="global">
              <h4 class="card-title">Dominio y Logo</h4>
            </div>
            <div class="card-content">

              <div class="row">
                <label class="col-sm-2 label-on-left"><strong>Url de la tienda Ej. https://www.tienda.com</strong></label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <input type="text" class="form-control" value="">
                    <span class="material-input"></span></div>
                </div>
                <div class="col-sm-10 offset-lg-2">
                  <p>Logo de la tienda (380x190 pixeles)</p>
                  
                  <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                    <div>
                      <span class="btn btn-outline-secondary btn-file">
                        <span class="fileinput-new">Selecciona imagen</span>
                        <span class="fileinput-exists">Cambiar</span>
                        <input type="file" name="...">
                      </span>
                      <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remover</a>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class='col-lg-12'>
        <div class="card">
          <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="global">
              <h4 class="card-title">API KEY</h4>
            </div>
            <div class="card-content">

              <div class="row">
                <label class="col-sm-2 label-on-left"><strong>API Key</strong></label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <textarea  rows="2" cols="20" readonly="readonly" id="apikeynew_edit" class="textarea_tokenapi" style="width: 100%; height:120px">eyJhbGciOiJodHRwOi8vd3d3LnczLm9yZy8yMDAxLzA0L3htbGRdasdasdasdadsInR5cCI6IkpXVCJ9.eyJjbGllbnRpZCI6IjYxOCIsImNsaWVudG5hbWUiOigsdfafafc3Nob3BAZ21haWwuY29tIn0.JTQun-zaFVCOZdeLpkbfzndlHC-l048tPaAz5XvKOqc</textarea>
                    <span class="material-input"></span></div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class='col-lg-12'>
        <div class="card">
          <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="global">
              <h4 class="card-title">API KEY</h4>
            </div>
            <div class="card-content">

              <div class='row'>
                <div class='col-lg-10 offset-lg-2'>
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">Redirección si la transaccion es aprobada</label>
                    <input type="text" class="form-control" value="https://gatewaypty.gbcpay.net/Response/response?tk=<?php echo '{{{tokenid}}}'; ?>">
                    <span class="material-input"></span>
                  </div>
                  <div class="form-group label-floating is-empty">
                    <label class="control-label">Redirección si la transaccion es rechazada</label>
                    <input type="text" class="form-control" value="https://gatewaypty.gbcpay.net/Response/response?tk=<?php echo '{{{tokenid}}}'; ?>">
                    <span class="material-input"></span>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class="row">
      <div class='col-lg-12'>
        <div class="card">
          <form method="get" action="/" class="form-horizontal">
            <div class="card-header card-header-text" data-background-color="global">
              <h4 class="card-title">Estatus</h4>
            </div>
            <div class="card-content">

              <div class="row">
                <label class="col-sm-2 label-on-left">Estatus de la Cuenta</label>

                <div class="col-sm-10">
                  <div class="form-group label-floating is-empty">
                    <label class="control-label"></label>
                    <select class="selectpicker show-tick" data-style="select-with-transitionx btn btn-primary"  title="Selecciona">
                      <option value="">Selecciona</option>
                      <option value="ve">Venezuela</option>
                      <option value="co">Colombia</option>
                      <option value="pe">Peru</option>
                    </select>
                    <span class="material-input"></span></div>
                </div>
              </div>

              <div class='row'>
                <label class="col-sm-4 label-on-left">Seleccione el ambiente transaccional</label>
                <div class="col-sm-4 ">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value=""> Producción
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" value=""> Sandbox
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end row -->

    <div class='row'>
      <div class='col-lg-12'>
        <button type="submit" class="btn btn-fill btn-global">Guardar</button>
      </div>
    </div>

  </div>
</div>
@endsection

@push('js')

<script type="text/javascript">

  $(document).ready(function () {
    var table = $('#processor_table').DataTable({
      orderCellsTop: false,
      paging: true,
      processing: true,
      cache: false,
      deferRender: true,
      /*scrollX: true,
       scrollCollapse: true,*/
      serverSide: false,
      responsive: true,
      language: {
        "lengthMenu": "Mostrando _MENU_ registros por página",
        "zeroRecords": "No encontrado",
        "info": "Total de registros: _MAX_",
        "infoEmpty": "No hay registros para mostrar",
        "infoFiltered": "(Resultado del filtro: _TOTAL_)",
        "processing": "Cargando...",
        "paginate": {
          "previous": "Anterior",
          "next": "Próximo",
          "last": "Última"
        },
        search: "_INPUT_",
        searchPlaceholder: "Search records",

      },
      ajax: {
        url: relative_path + "/ajax-processors-get-all",
        type: 'POST',
        //contentType: "application/json",
        dataSrc: ''
      },
      columns: [
        {data: 'Id', title: 'MERCH_NBR°', searchable: true},
        {data: 'Merchantname', title:"MERCH_NAME", searchable: true},
        {data: 'fieldempty',title:"DBA_NBR",  searchable: true},
        {data: 'termnialfield', title:"TERMINAL_NBR", searchable: true},
        {data: 'descript', title:"DESCRIPCION", searchable: true},
        {data: 'Estatus', title:"STATUS", searchable: true}
      ],
      dom: 'Brt  <"sleft" l ><"sright" p >',
      buttons: [
        {
          text: 'Nuevo',
          className: 'buttons-custom',
          action: function (e, dt, node, config) {
            //alert( 'Button activated' );
          }
        }
      ]
    });
    
  });

</script>

@endpush
