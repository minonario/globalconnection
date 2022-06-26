@extends('layouts.app', ['activePage' => 'customers.list', 'titlePage' => __('Clientes')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
        <div class="card tables">
          <div class="card-header card-header-icon-ds8 card-header-primary">
            <i class="material-icons">manage_accounts</i>
          </div>
          <div class="card-body">
            <h4 class="card-title">Clientes</h4>
            <div class="table-responsive">
              <table class="table table-striped" id="customers_table" style="position: relative; white-space: nowrap">
                <thead class=" text-primary" style="width:100%;white-space: nowrap">
                  <tr class="nowrap">
                    <th class="nowrap">Accion</th>
                    <th class="nowrap">CodigoInterno</th>
                    <th class="nowrap">Logo</th>
                    <th class="nowrap">NombreComercio</th>
                    <th class="nowrap">RazonSocial</th>
                    <th class="nowrap">Estatus</th>
                    <th class="nowrap">Telefono</th>
                    <th class="nowrap">CodigoPostal</th>
                    <th class="nowrap">EmailContacto</th>
                    <th class="nowrap">UrlTienda</th>
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


  });

</script>

@endpush
