        <?php 
  
  $routeArray = app('request')->route()->getAction();
  $controllerAction = class_basename($routeArray['controller']);
  list($controller, $action) = explode('@', $controllerAction);
  
  ?>

<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="/" class="simple-text logo-normal">
      <img style="width: 135px;margin: 0 auto;" src="{{ asset('material') }}/img/globalconnection-logo.png" />
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Situación General') }}</p>
        </a>
      </li>
      <!--<li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}"> 22-06-2022 -->
      <li class="nav-item{{ $controller == 'TransactionsController' && !($activePage == 'applications.urlpayment') ? ' active' : '' }}">
        <a class="nav-link collapsed" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
          <i class="material-icons">storage</i>
          <p>{{ __('Reportes') }}
            <b class="caret"></b>
          </p>
        </a>
        <!--<div class="collapse show" id="laravelExample"> 22-06-2022 -->
        <div id="laravelExample" class="nav-item {{ $controller == 'TransactionsController' && !($activePage == 'applications.urlpayment') ? ' collapse show' : 'hide collapse' }}">  
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'transactions.list' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('transactions.list') }}">
                <span class="sidebar-mini"> RT </span>
                <span class="sidebar-normal">{{ __('Transacciones') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'transactions.daily_closing_summary' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('transactions.daily_closing_summary') }}">
                <span class="sidebar-mini"> DCS </span>
                <span class="sidebar-normal">{{ __('Cierre Diario Resumen') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'transactions.daily_closing_detail' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('transactions.daily_closing_detail') }}">
                <span class="sidebar-mini"> DCD </span>
                <span class="sidebar-normal">{{ __('Cierre Diario Detalle') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'transactions.settlements' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('transactions.settlements') }}">
                <span class="sidebar-mini"> RL </span>
                <span class="sidebar-normal"> {{ __('Liquidaciones') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'transactions.clientreport' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('transactions.clientreport') }}">
                <span class="sidebar-mini"> RC </span>
                <span class="sidebar-normal"> {{ __('Resumen Clientes') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'customers.list' || $activePage == 'customers.create' ? ' active' : '' }}">
         <a class="nav-link collapsed" data-toggle="collapse" href="#customerModule" aria-expanded="false">
           <i class="material-icons">manage_accounts</i>
            <p>{{ __('Clientes') }}
            <b class="caret"></b>
          </p>
        </a>
        <!--<div class="collapse hide" id="customerModule"> 22-06-2022 --> 
        <div id="customerModule" class="nav-item {{ ($activePage == 'customers.list' || $activePage == 'customers.create') ? ' collapse show' : 'hide collapse' }}">  
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'customers.list' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('customers.list') }}">
                <span class="sidebar-mini"> C </span>
                <span class="sidebar-normal">{{ __('Clientes') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'customers.create' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('customers.create') }}">
                <span class="sidebar-mini"> AC </span>
                <span class="sidebar-normal">{{ __('Alta Cliente') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <!--<li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}"> 22-06-2022 -->
      <li class="nav-item{{ ($activePage == 'users.list' || $controller == 'HomeController') && !($activePage == 'dashboard') ? ' active' : '' }}">
        <a class="nav-link collapsed" data-toggle="collapse" href="#configurationModule" aria-expanded="false">
          <i class="material-icons">supervised_user_circle</i>
          <p>{{ __('Configuración') }}
            <b class="caret"></b>
          </p>
        </a>
        <!--<div class="collapse hide" id="configurationModule">-->
        <div id="configurationModule" class="nav-item {{ ($activePage == 'users.list' || $controller == 'HomeController') && !($activePage == 'dashboard') ? ' collapse show' : 'hide collapse' }}">  
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'users.list' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('users.list') }}">
                <span class="sidebar-mini"> U </span>
                <span class="sidebar-normal">{{ __('Usuarios') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'config.whitelistcard' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('config.whitelistcard') }}">
                <span class="sidebar-mini"> WL </span>
                <span class="sidebar-normal"> {{ __('Lista Blanca de Tarjetas') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'config.blacklistip' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('config.blacklistip') }}">
                <span class="sidebar-mini"> BL </span>
                <span class="sidebar-normal"> {{ __('Lista Negra de IP') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'config.blacklistemail' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('config.blacklistemail') }}">
                <span class="sidebar-mini"> BE </span>
                <span class="sidebar-normal"> {{ __('Lista Negra de Email') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'config.blacklistcard' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('config.blacklistcard') }}">
                <span class="sidebar-mini"> BC </span>
                <span class="sidebar-normal"> {{ __('Lista Negra de Tarjetas') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'config.blacklistbins' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('config.blacklistbins') }}">
                <span class="sidebar-mini"> BLB </span>
                <span class="sidebar-normal"> {{ __('Lista Negra de Bines') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'config.locksbyip' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('config.locksbyip') }}">
                <span class="sidebar-mini"> LIP </span>
                <span class="sidebar-normal"> {{ __('Bloqueos por IP') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="">
          <i class="material-icons">data_thresholding</i>
          <p>{{ __('Risk Score') }}</p>
        </a>
      </li>
      
      <!--<li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}"> 22-06-2022 -->
      <li class="nav-item{{ $activePage == 'applications.urlpayment' ? ' active' : '' }}">
         <a class="nav-link collapsed" data-toggle="collapse" href="#applicationModule" aria-expanded="false">
          <i class="material-icons">apps</i>
          <p>{{ __('Aplicaciones') }}
            <b class="caret"></b>
          </p>
        </a>
        <!--<div class="collapse hide" id="applicationModule"> 22-06-2022 -->
        <div id="applicationModule" class="nav-item {{ $activePage == 'applications.urlpayment' ? ' collapse show' : 'hide collapse' }}">  
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'applications.urlpayment' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('applications.urlpayment') }}">
                <span class="sidebar-mini"> LC </span>
                <span class="sidebar-normal">{{ __('Link de Cobro') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      
    </ul>
  </div>
</div>