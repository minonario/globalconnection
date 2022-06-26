@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Situación General')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">

    </div>

    <div class="row cuselect">
      
      
    </div>

    <div class="row cuselect">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="form-group label-floating is-empty bmd-form-group is-filled">
          <label class="control-label bmd-label-static">Seleccione rango de fechas</label>
          <input type="text" id="transaction_date" style="margin-top: 11px;" class="form-control" name="transaction_date" required=""  aria-required="true">
          <span class="material-input"></span>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="form-group label-floating xu is-empty">
          <label class="control-label">Seleccione la moneda</label>
          <select class="selectpicker show-tick" name="currency" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
            <option value="">Seleccione...</option>
            <option value="usd">USD</option>
            <option value="4">MXN</option>
          </select>
          <span class="material-input"></span>
        </div>
      </div>
      
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="form-group label-floating xu is-empty">
          <label class="control-label">Seleccione el Comercio</label>
          <select class="selectpicker show-tick" name="commerce" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
                <option value="">Seleccione...</option>
		<option value="5">DEMO GLOBAL PROD</option>
		<option value="19">DEMO GLOBAL (Sandbox)</option>
          </select>
          <span class="material-input"></span>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="form-group label-floating xu is-empty">
          <label class="control-label">Seleccione Método de Pago</label>
          <select class="selectpicker show-tick" name="payment_type" required data-style="select-with-transition btn btn-primary"  title="Seleccione...">
            <option value="">Seleccione...</option>
            <option value="2">Tarjeta</option>
            <option value="4">Zelle</option>
          </select>
          <span class="material-input"></span>
        </div>
      </div>
    </div>

    <div class="row" style="margin: 10px 0 40px 0">
      <div class="col-lg-12">
        <hr style="width:100%">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats ds8initiated">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
              <i class="material-icons">electric_bike</i>
            </div>
            <p class="card-category">Iniciadas</p>
            <h3 class="card-title">0%
            </h3>
          </div>
          <div class="card-footer">
            <div class="stats">
              <h2><span>0.00</span></h2>
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
            <p class="card-category">Aprobadas</p>
            <h3 class="card-title">0%</h3>
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
              <i class="material-icons">info_outline</i>
            </div>
            <p class="card-category">Rechazadas</p>
            <h3 class="card-title">0%</h3>
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
      <div class="col-md-4">
        <div class="card card-chart" style="padding: 20px">
          <div class="card-header card-header-tabs card-header-primary">
            Transacciones por Metodo de Pago
          </div>
          <div class="card-body">
            <canvas id="myChart_tmp" width="400" height="400" style="display:none"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-4">           
        <div class="card card-chart" style="padding: 20px">
          <div class="card-header card-header-tabs card-header-primary">
            Transacciones por Tipo de Tarjeta
          </div>
          <div class="card-body">
            <canvas id="myChart_ttt" width="400" height="400" style="display:none"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-4">           
        <div class="card card-chart" style="padding: 20px">
          <div class="card-header card-header-tabs card-header-primary">
            Transacciones por Marca de Tarjeta
          </div>
          <div class="card-body">
            <canvas id="myChart_tcb" width="400" height="400" style="display:none"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="card card-chart" style="padding: 20px">
          <div class="card-header card-header-tabs card-header-primary" >
            Monto de Transacciones
          </div>
          <div class="card-body">
            <canvas id="myChart_mt" width="400" height="400" style="display:none"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-chart" style="padding: 20px">
          <div class="card-header card-header-tabs card-header-primary" >
            Cantidad de Transacciones
          </div>
          <div class="card-body">
            <canvas id="myChart_ct" width="400" height="400" style="display:none"></canvas>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function () {
    // Javascript method's body can be found in assets/js/demos.js
    md.initDashboardPageCharts();

  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<style>
  .card .card-header-warning .card-icon { background: linear-gradient(60deg, #0a6aff, #0a93ff) !important;}
</style>
@endpush