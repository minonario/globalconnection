@extends('layouts.app', ['activePage' => 'transactions.administrator', 'titlePage' => __('Administración')])

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
            <h4 class="card-title">Transacciones Administración</h4>
            <div class="table-responsive">
              <table class="table" id="transactions_table" style="position: relative; white-space: nowrap">
                <thead class=" text-primary">
                  <tr>
                  <th>accion</th>
                  <th>transactionid</th>
                  <th>Fecha</th>
                  <th>FechaFinish</th>
                  <th>DescriptionTransactionType</th>
                  <th>Amount</th>
                  <th>CardID</th>
                  <th>TransactionResult</th>
                  <th>Country</th>
                  <th>Email</th>
                  <th>Ip</th>
                  <th>Riskscore</th>
                  <th>ValorRiskscore</th>
                  <th>RRNOriginal</th>
                  <th>ApprovedCode</th>
                  <th>Banco</th>
                  <th>Aggregator</th>
                  <th>Client</th>
                  <th>Reference</th>
                  <th>Criterio</th>
                  <th>CountryCard</th>
                  <th>Telefono</th>
                  <th>TerminalID</th>
                  <th>Dba</th>
                  <th>Estatus_Liquidacion</th>
                  <th>FechaLiquidacion</th>
                  <th>CreateUserV2</th>
                  <th>Channel</th>
                  <th>reference2</th>
                  <th>ZelleSenderName</th>
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
          <div class="tab-pane fade show active" id="dataextra" role="tabpanel" aria-labelledby="dataextra-tab">extra</div>
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
