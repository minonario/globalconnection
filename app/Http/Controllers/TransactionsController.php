<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
//use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DateTime;

class TransactionsController extends Controller {

  //
  public function __construct() {
    $this->middleware('auth');
  }

  public function additional_data(Request $request) {
    $id = $request->input('id');
  }

  public function risk_score_detail_data(Request $request) {
    $id = $request->input('id');
  }

  public function json_email_risk_score(Request $request) {
    $id = $request->input('id');
  }

  public function json_proxy_risk_score(Request $request) {
    $id = $request->input('id');
  }

  public function json_ia_risk_score(Request $request) {
    $id = $request->input('id');
  }
  
  public function cmp($a, $b) {
    if ($a['transaction_date'] == $b['transaction_date']) {
      return 0;
    }
    $aa = Carbon::createFromFormat('m/y/Y h:i:s A', $a['transaction_date']);
    $bb = Carbon::createFromFormat('m/d/Y h:i:s A', $b['transaction_date']);

    return ($aa->lte($bb)) ? -1 : 1;
    //return ($a['transaction_date'] < $b['transaction_date']) ? -1 : 1;
  }

  public function ajax_transactions_get_all(Request $request) {
    $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
    ];

    $client = new Client([
        'headers' => $headers
    ]);

    $parameters = array(
        'token' => "YYYZZZ",
        'customer_id' => 2,
        'serial' => "");

    $columns = $request->input('columns');
    $order = $request->input('order');

    if ($order[0]['column'] != 0) {
      //$columnOrder = array('ColumnOrder' => self::get_table_name($columns[$order[0]['column']]['data']), 'Criteria' => $order[0]['dir']);
      $columnOrder = array('ColumnOrder' => $columns[$order[0]['column']]['data'], 'Criteria' => $order[0]['dir']);
    }

    $get_both = array_filter($columns, 'self::get_both', ARRAY_FILTER_USE_BOTH);

    $column_filter = array();
    foreach ($get_both as $column => $value) {
      //$column_filter[] = array ( 'Column' => self::get_table_name($value['data']), 'Value' => $value['search']['value'] );
      $column_filter[] = array('Column' => $value['data'], 'Value' => $value['search']['value']);
    }

    /* $result = $client->request('POST', config('app.api_host') . '/GetTransactions', [
      'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
      ]);

      $code = $result->getStatusCode();
      $body = $result->getBody();
      $json = json_decode($body); */
    
    $json = json_decode(Storage::disk('public')->get('/transactions.json'));
    //$list = collect((array)$json->data);
    $data = (array)$json->data;
    $data = json_decode(json_encode($data), true);
    
    if ($order[0]['column'] != 0) {
      //$list = $list->sortBy($columnOrder['ColumnOrder'], $columnOrder['Criteria'] === 'asc' ? SORT_ASC : SORT_DESC, true);
      //$list = $list->SortByDesc($columnOrder['ColumnOrder']);
      array_multisort(array_map(function($element) use ($columnOrder) {
          return $element[$columnOrder['ColumnOrder']];
      }, $data), $columnOrder['Criteria'] === 'asc' ? SORT_ASC : SORT_DESC, $data);
      
        if($columnOrder['ColumnOrder'] === 'transaction_date') {
          //uasort($data,'self::cmp');
          uasort ( $data , function ($a, $b) use($columnOrder){
                  if ($a['transaction_date'] == $b['transaction_date']) {
                    return 0;
                  }
                  $aa = Carbon::createFromFormat('m/d/Y h:i:s A', $a['transaction_date']);
                  $bb = Carbon::createFromFormat('m/d/Y h:i:s A', $b['transaction_date']);
                  if ($columnOrder['Criteria'] === 'asc'){
                    return ($aa->gte($bb)) ? -1 : 1;
                  }else{
                    return ($aa->lte($bb)) ? -1 : 1;
                  }
              }
          );
        }
      
      $list = collect((array)$data);
    }

    foreach ($column_filter as $column) {

      switch ($column['Column']) {
        case 'transaction_date' :
          $dates = explode('-', preg_replace('/\s+/', '', $column['Value']));
          $startDate2 = Carbon::createFromFormat('m/d/Y h:i:s A', $dates[0] . " 00:00:00 AM");
          $endDate2 = Carbon::createFromFormat('m/d/Y h:i:s A', $dates[1] . " 00:00:00 AM");

          $ad = $endDate2->format('m/d/Y h:i:s A');

          $multiplied = $list->map(function (&$item, $key) {
            $item->transaction_date = Carbon::createFromFormat('m/d/Y h:i:s A', $item->transaction_date);
            return $item;
          });
          $list = $multiplied->whereBetween('transaction_date', [$startDate2, $endDate2]);
          
          $list = $list->map(function (&$item, $key) {
            $item->transaction_date = $item->transaction_date->format('m/d/Y h:i:s A');
            return $item;
          });
          break;
        default:
          $list = collect($list)->filter(function ($item) use ($column) {
              return false !== stristr($item[$column['Column']], $column['Value']);
          });
          break;
      }
    }

    $json->recordsTotal = $list->count(); //$json->total;
    $json->recordsFiltered = $list->count(); //$json->total;
    if($list->count() <= 10){
    }else{
      $list = $list->skip($request->input('start'))->take($request->input('length'));
    }
    
    $response = array(
        "draw" => $request->input('draw'),
        "recordsTotal" => $json->recordsTotal,
        "recordsFiltered" => $json->recordsFiltered,
        "data" => array_values($list->toArray())
    );
    echo json_encode($response);
  }
  
  public function object_to_array($data) {
    if (is_array($data) || is_object($data)) {
      $result = [];
      foreach ($data as $key => $value) {
        $result[$key] = (is_array($data) || is_object($data)) ? object_to_array($value) : $value;
      }
      return $result;
    }
    return $data;
  }

  public function get_table_name($column) {
    switch ($column) {
      case 'FechaTransaccion' : return 'T.Created';
        break;
      case 'NumeroReferencia' : return 't.ReferenceNumber';
        break;
      case 'MontoTransaccion' : return 't.Amount';
        break;
      case 'NumeroTrama' : return 'T.Trama';
        break;
      case 'NumeroTarjeta' : return 't.CardNumber';
        break;
      case 'TipoTarjeta' : return 't.CardLabel';
        break;
      case 'TipoOperacion' : return 't.MessageType';
        break;
      case 'NumeroLote' : return 'T.BatchNumber';
        break;
      case 'CommerceName' : return 'c.Name';
        break;
      case 'SerialDevice' : return 'T.Serial';
        break;
      case 'TerminalId' : return 't.TerminalId';
        break;
      case 'MerchantId' : return 'T.MerchantId';
        break;
      case 'NumeroAprobacion' : return 't.ApprovedNumber';
        break;
      case 'CodigoRespuesta' : return 't.ResponseCode';
        break;
    }
  }

  public function get_both($val, $key) {
    if ($val['search']['value'] != null) {
      return $val;
    } else {
      return false;
    }
  }

  public function ajax_settlements_get_all(Request $request) {
    $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
    ];

    $client = new Client([
        'headers' => $headers
    ]);

    $parameters = array(
        'token' => "YYYZZZ",
        'customer_id' => 2,
        'serial' => "");

//        $result = $client->request('POST', config('app.api_host') . '/GetSettlements', [
//            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
//        ]);
//
//        $code = $result->getStatusCode();
//        $body = $result->getBody();
//        $json = json_decode($body);

    $json = json_decode(Storage::disk('public')->get('/settlements.json'));

    echo json_encode($json->data);
  }

  public function ajax_client_summary_get_all(Request $request) {
    $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
    ];

    $client = new Client([
        'headers' => $headers
    ]);

    $parameters = array(
        'token' => "YYYZZZ",
        'customer_id' => 2,
        'serial' => "");

    // 22-06-2022 - avc2 - clientsummary
    
    //$result = $client->request('POST', config('app.api_host') . '/dllGlobalIsapi.dll/clientsummary', [
    $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/clientsummary', [
        'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
    ]);

    $code = $result->getStatusCode();
    $body = $result->getBody();
    $json = json_decode($body);

    //$json = json_decode(Storage::disk('public')->get('/clientsummary.json'));

    echo json_encode($json->data);
  }

  //Daily Closing Detail - Cierre Diario Detalle
  public function ajax_daily_closing_detail_get_all(Request $request) {
    $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
    ];

    $client = new Client([
        'headers' => $headers
    ]);

    $parameters = array(
        'token' => "YYYZZZ",
        'customer_id' => 2,
        'serial' => "");
    
        //23-06-2022 avc2

//        $result = $client->request('POST', config('app.api_host') . '/GetSettlements', [
//            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
//        ]);
//
//        $code = $result->getStatusCode();
//        $body = $result->getBody();
//        $json = json_decode($body);

    $json = json_decode(Storage::disk('public')->get('/daily_closing_detail.json'));

    echo json_encode($json->data);
  }
  
  //Daily Closing Summary- Cierre Diario Resumen
  public function ajax_daily_closing_summary_get_all(Request $request) {
    $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
    ];

    $client = new Client([
        'headers' => $headers
    ]);

    $parameters = array(
        'token' => "YYYZZZ",
        'customer_id' => 2,
        'serial' => "");

//        $result = $client->request('POST', config('app.api_host') . '/GetSettlements', [
//            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
//        ]);
//
//        $code = $result->getStatusCode();
//        $body = $result->getBody();
//        $json = json_decode($body);

    $json = json_decode(Storage::disk('public')->get('/daily_closing_summary.json'));

    echo json_encode($json->data);
  }
  
  public function index() {

    $actualDate = date("d-m-Y");
    $lastMonth = date("d-m-Y");

    $data = array(
        'FechaFin' => $actualDate,
        'FechaIni' => $lastMonth,
        'TipoOper' => 200
    );

    return view('transactions.list')->with('data', $data);
  }

  public function settlements_report() {

    $actualDate = date("d-m-Y");
    $lastMonth = date("d-m-Y");

    $data = array(
        'FechaFin' => $actualDate,
        'FechaIni' => $lastMonth,
        'TipoOper' => 200
    );

    return view('transactions.settlements')->with('data', $data);
  }

  public function client_summary_report() {

    $actualDate = date("d-m-Y");
    $lastMonth = date("d-m-Y");

    $data = array(
        'FechaFin' => $actualDate,
        'FechaIni' => $lastMonth,
        'TipoOper' => 200
    );

    return view('transactions.clientreport')->with('data', $data);
  }

  public function daily_closing_summary() {

    $actualDate = date("d-m-Y");
    $lastMonth = date("d-m-Y");

    $data = array(
        'FechaFin' => $actualDate,
        'FechaIni' => $lastMonth,
        'TipoOper' => 200
    );

    return view('transactions.daily_closing_summary')->with('data', $data);
  }
  
  public function daily_closing_detail() {

    $actualDate = date("d-m-Y");
    $lastMonth = date("d-m-Y");

    $data = array(
        'FechaFin' => $actualDate,
        'FechaIni' => $lastMonth,
        'TipoOper' => 200
    );

    return view('transactions.daily_closing_detail')->with('data', $data);
  }
  
  public function urlpayment() {

    $actualDate = date("d-m-Y");
    $lastMonth = date("d-m-Y");

    $data = array(
        'FechaFin' => $actualDate,
        'FechaIni' => $lastMonth,
        'TipoOper' => 200
    );

    return view('transactions.urlpayment')->with('data', $data);
  }
  
  public function paymentgateway() {

    $actualDate = date("d-m-Y");
    $lastMonth = date("d-m-Y");

    $data = array(
        'FechaFin' => $actualDate,
        'FechaIni' => $lastMonth,
        'TipoOper' => 200
    );

    return view('transactions.paymentgateway')->with('data', $data);
  }
  
  public function ajax_urlpayments_get_all(Request $request) {
    $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
    ];

    $client = new Client([
        'headers' => $headers
    ]);

    $parameters = array(
        'token' => "YYYZZZ",
        'customer_id' => 2,
        'serial' => "");


    $json = json_decode(Storage::disk('public')->get('/urlpayments.json'));

    echo json_encode($json->data);
  }
  
  public function generate_token(Request $request){
    
    echo 'https://global.deseisaocho.com/PaymentGateway/PaymentGateway?token=bb22c6f6e4gdfa9aa3f4b79d1229afb99';
  }
  
}
