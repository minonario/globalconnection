@extends('layouts.app', ['activePage' => 'transactions.list', 'titlePage' => __('Transacciones')])

@section('content')
<div class="content">
  <div class="container-fluid">

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

      <div class="col-md-12">
        <div class="card tables">
          <div class="card-header card-header-icon-ds8 card-header-primary">
            <i class="material-icons">storage</i>
          </div>
          <div class="card-body">
            <h4 class="card-title">Transacciones</h4>
            <div class="table-responsive">
              <table class="table" id="transactions_table" style="position: relative; white-space: nowrap">
                <thead class=" text-primary">
                  <tr>
                  <th>accion</th>
                  <th>customer_id</th>
                  <th>serial</th>
                  <th>terminal_id</th>
                  <th>merchant_id</th>
                  <th>reference</th>
                  <th>uuid</th>
                  <th>ip_client</th>
                  <th>card_number</th>
                  <th>card_holdername</th>
                  <th>approved_code</th>
                  <th>process_code</th>
                  <th>reference_code</th>
                  <th>result_code</th>
                  <th class="description">description</th>
                  <th>total_amount</th>
                  <th>total_received</th>
                  <th>currency</th>
                  <th>email</th>
                  <th>phone_numbers</th>
                  <th>transaction_date</th>
                  <th>approved_date</th>
                  <th>token_id</th>
                  <th>latitude</th>
                  <th>longitude</th>
                  <th>type_tran_id</th>
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
<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="transactionModalLabel">Detalle de la transacción: #_#</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul class="nav nav-tabs" id="transaction-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="dataextra-tab" data-toggle="tab" href="#dataextra" role="tab" aria-controls="dataextra" aria-selected="true">Datos Adicionales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="driskscore-tab" data-toggle="tab" href="#driskscore" role="tab" aria-controls="driskscore" aria-selected="false">Detalle Risk Score</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="jsonemail-tab" data-toggle="tab" href="#jsonemail" role="tab" aria-controls="jsonemail" aria-selected="false">Json Email</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="jsonproxy-tab" data-toggle="tab" href="#jsonproxy" role="tab" aria-controls="jsonproxy" aria-selected="false">Json Proxy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="jsonia-tab" data-toggle="tab" href="#jsonia" role="tab" aria-controls="jsonia" aria-selected="false">Json IA</a>
          </li>
        </ul>
        <div class="tab-content" id="transaction-tabContent">
          <div class="tab-pane fade show active" id="dataextra" role="tabpanel" aria-labelledby="dataextra-tab">
            <div id="additional_data_div">

              <p><strong>Email del cliente:</strong> <span id="email_client" class="additional_data">No aplica</span></p>
              <br>
              <p><strong>Ip de la Transacción:</strong> <span id="IP" class="additional_data">186.185.3.159</span></p>
              <br>
              <div id="div_zelle">
                <p><strong>Monto Solicitado:</strong> <span id="monto_solicitado" class="additional_data">$72.10</span></p>
                <br>
                <p><strong>Monto Enviado:</strong> <span id="monto_enviado" class="additional_data">$72.10</span></p>
                <br>
                <p><strong>Resultado de la Operación:</strong> <span id="resultado_zelle" class="additional_data">Finalizada con exito</span></p>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="driskscore" role="tabpanel" aria-labelledby="driskscore-tab">score</div>
          <div class="tab-pane fade" id="jsonemail" role="tabpanel" aria-labelledby="jsonemail-tab">email</div>
          <div class="tab-pane fade" id="jsonproxy" role="tabpanel" aria-labelledby="jsonproxy-tab">proxy</div>
          <div class="tab-pane fade" id="jsonia" role="tabpanel" aria-labelledby="jsonia-tab">jsonia</div>
        </div>
        <!-- tabs transactions details -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

<script type="text/javascript">

    $(document).ready(function() {


    });

</script>

@endpush
