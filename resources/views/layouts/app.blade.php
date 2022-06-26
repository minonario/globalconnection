<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Global Connection') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/logoicon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/logoicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <!--<link href="{{ asset('material') }}/css/bootstrap.min.css?v=2.1.1" rel="stylesheet" />-->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.6" rel="stylesheet" />
    <link href="{{ asset('material') }}/css/customs.css?v=2.2.9" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
    <!--<link href="{{ asset('material') }}/css/dataTables.bootstrap4.min.cssdataTables.bootstrap4.min.css?v=2.2.9" rel="stylesheet" />-->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">-->
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
    
    <script type="text/javascript">  
    var relative_path = '{{ env("RELATIVE_PATH") }}';
    var cupath = '{{Request::route()->getName()}}';

    </script>
    <style>
      .linktext {
        color: #000;
      }
      .separator {
        display: flex;
        align-items: center;
        text-align: center;
        margin-top: 25px;
      }
      .separator::before {
        margin-right: .25em;
      }
      .separator::before, .separator::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #000;
      }
      #generarLiga .error {
        color: red !important;
        font-size: 12px;
      }
      .custom-file-input {
        min-width: 14rem;
        max-width: 100%;
        height: 3.2rem;
        margin: 0;
        filter: alpha(opacity=0);
        opacity: 0;
      }
      .custom-file {
        position: relative;
        display: inline-block;
        max-width: 100%;
        height: 3.2rem;
        margin-bottom: 0;
        cursor: pointer;
      }
      .clientreport .stats, .clientreport .stats b {
        position: relative;
        width: 100%;
      }
      
    </style>
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
        
        
        <!--   Core JS Files   -->
        <!--<script src="{{ asset('material') }}/js/core/jquery.min.js"></script>-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/material.min.js"></script>
        <script src="{{ asset('material') }}/js/arrive.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <!--<script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>-->
        <script src="{{ asset('material') }}/js/bootstrap.min.js"></script>
        
        <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <!--<script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>-->
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.5" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="{{ asset('material') }}/demo/demo.js"></script>
        <script src="{{ asset('material') }}/js/settings.js"></script>
        
        <script src="{{ asset('material') }}/js/jquery.validate.min.js"></script>
        <script src="{{ asset('material') }}/js/messages_es.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        
        <!--<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>-->
        
        <!-- FORMAT DATE DATETIME AND MOMENT -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        
        
        <!-- END FORMAT PLUG -->
        <script src="{{ asset('material') }}/js/plugins/jquery.select-bootstrap.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/colreorder/1.5.5/js/dataTables.colReorder.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
        
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
        
        @if (Request::route()->getName() == 'home')
        <script src="{{ asset('material') }}/js/chartscustom.js?v=5" type="text/javascript"></script>
        @endif
        <?php 
  
  $routeArray = app('request')->route()->getAction();
  $controllerAction = class_basename($routeArray['controller']);
  list($controller, $action) = explode('@', $controllerAction);
  

  if ($controller === 'HomeController'){ ?>

  <?php
  }elseif ($controller === 'TransactionsController'){
  ?>
      <script src="{{ asset('material') }}/js/datatables-transactions.js?v=7" type="text/javascript"></script>
  <?php
  }elseif ($controller === 'CustomersController'){
  ?>
      <script src="{{ asset('material') }}/js/datatables-customers.js?=4" type="text/javascript"></script>
  <?php
  }
  ?>
        
        @stack('js')
    </body>
</html>