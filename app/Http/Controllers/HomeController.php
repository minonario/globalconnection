<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }
    
    public function ajax_resume_transactions(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array(
        );
        
        // SECOND GIT

        $result = $client->request('POST', config('app.api_host') . '/ResumenTransactions', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => '{}'//json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        
        $combine = array_combine($json->data->datasets->labels,$json->data->datasets->data);
        
        echo json_encode($combine);
    }
    
    public function ajax_transactions_by_card_type(Request $request){
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array(
        );

        $result = $client->request('POST', config('app.api_host') . '/TransactionByCardType', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => '{}'//json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        
        $combine = array_combine($json->data->datasets->labels,$json->data->datasets->data);
        
        echo json_encode($json->data->datasets);
    }
    
    public function ajax_transactions_by_card_brand(Request $request){
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array(
        );

        // TO-DO SRV01
//        $result = $client->request('POST', config('app.api_host') . '/TransactionByCardBrand', [
//            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => '{}'//json_encode($parameters)
//        ]);
//
//        $code = $result->getStatusCode();
//        $body = $result->getBody();
        $json = json_decode(Storage::disk('public')->get('/transactionsbycardbrand.json'));
        
        $combine = array_combine($json->data->datasets->labels,$json->data->datasets->data);
        
        echo json_encode($json->data->datasets);
    }
    
    public function ajax_count_transactions(Request $request){
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array(
        );

//        $result = $client->request('POST', config('app.api_host') . '/CountTransactions', [
//            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => '{}'//json_encode($parameters)
//        ]);
//
//        $code = $result->getStatusCode();
//        $body = $result->getBody();
//        $json = json_decode($body);
        
        $json = json_decode(Storage::disk('public')->get('/bar_count_transactions.json'));
        
        $array_tipo_oper = array('Aprobadas' => 200, 'Rechazadas' => 420, 'Otros' => 400);
        $list = $json->data->datasets;
        
        $list = array_map( function($value) use ($array_tipo_oper) {

            switch($value->label) {
              case 'Aprobadas': 
                  $value->borderColor = array('rgba(153, 102, 255, 1)');
                  $value->backgroundColor = array('rgba(153, 102, 255, 0.8)');
                break;
              case 'Rechazadas': 
                  $value->borderColor = array('rgba(54, 162, 235, 1)');
                  $value->backgroundColor = array('rgba(54, 162, 235, 0.8)');
                break;
              case 'Otros': 
                  $value->borderColor = array('rgba(206, 206, 206, 1)');
                  $value->backgroundColor = array('rgba(206, 206, 206, 0.8)');
                break;
              default: break;
            }
        }, $list);
        
        echo json_encode($json->data);
    }
    
    public function ajax_count_method_sale(Request $request){
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array(
        );

        $result = $client->request('POST', config('app.api_host') . '/CountMethodSale', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => '{}'//json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        
        echo json_encode($json->data->datasets);
    }
    
    public function ajax_amount_transactions(Request $request){
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array(
        );

//        $result = $client->request('POST', config('app.api_host') . '/AmountTransactions', [
//            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => '{}'//json_encode($parameters)
//        ]);
//
//        $code = $result->getStatusCode();
//        $body = $result->getBody();
//        $json = json_decode($body);
        
        $json = json_decode(Storage::disk('public')->get('/bar_amount_transactions.json'));

        $array_tipo_oper = array('Aprobadas' => 200, 'Rechazadas' => 420, 'Otros' => 400);
        $list = $json->data->datasets;
        
        $list = array_map( function($value) use ($array_tipo_oper) {

            switch($value->label) {
              case 'Aprobadas': 
                  $value->borderColor = array('rgba(153, 102, 255, 1)');
                  $value->backgroundColor = array('rgba(153, 102, 255, 0.8)');
                break;
              case 'Rechazadas': 
                  $value->borderColor = array('rgba(255, 99, 132, 1)');
                  $value->backgroundColor = array('rgba(255, 99, 132, 0.8)');                  
                break;
              case 'Otros': 
                  $value->borderColor = array('rgba(54, 162, 235, 1)');
                  $value->backgroundColor = array('rgba(54, 162, 235, 0.8)');                  
                break;
              default: break;
            }
        }, $list);
        
        echo json_encode($json->data);
    }
    
    public function whitelistcard(){
      
      return view('config.whitelistcard');
    }
    
    public function ajax_whitelistcard_get_all(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);
        
        $parameters = array();
        
        // 22-06-2022 avc2 dllGlobalIsapi.dll/whitelistcard
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/whitelistcardIsapi.dll/whitelistcard", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/whitelistcard', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        
//        $data = $json->data;
//        $json = json_decode(Storage::disk('public')->get('/whitelistcard.json'));
        
        echo json_encode($json->data);
    }
    
    public function blacklistip(){
      
      return view('config.blacklistip');
    }
    
    public function ajax_blacklistip_get_all(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);
        
        $parameters = array();
            
        // 22-06-2022 - avc2
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/blacklistipIsapi.dll/blacklistip", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/blacklistip', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data = $json->data;
        
        //$json = json_decode(Storage::disk('public')->get('/blacklistip.json'));
        
        echo json_encode($data);
    }
    
    public function blacklistemail(){
      
      return view('config.blacklistemail');
    }
    
    public function ajax_blacklistemail_get_all(Request $request) {
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

        $parameters = array();
          
        // 22-06-2022 - avc2
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/blacklistemailIsapi.dll/blacklistemail", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/blacklistemail', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data = $json->data;
        
        //$json = json_decode(Storage::disk('public')->get('/blacklistemail.json'));
        
        echo json_encode($data);
    }
    
    public function blacklistcard(){
      
      return view('config.blacklistcard');
    }
    
    public function ajax_blacklistcard_get_all(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);
        
        $parameters = array();
            
        // 22-06-2022 avc2
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/blacklistcardIsapi.dll/blacklistcard", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/blacklistcard', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data = $json->data;
        
        //$json = json_decode(Storage::disk('public')->get('/blacklistcard.json'));
        
        echo json_encode($data);
    }
    
    public function blacklistbins(){
     
      return view('config.blacklistbins');
    }
    
    public function ajax_blacklistbins_get_all(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);
        
        $parameters = array();

        // 22-06-2022 avc2
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/blacklistbinsIsapi.dll/blacklistbins", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/blacklistbins', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data = $json->data;
        
        //$json = json_decode(Storage::disk('public')->get('/blacklistbins.json'));
        
        echo json_encode($data);
    }
    
    public function locksbyip(){
      
      return view('config.locksbyip');
    }
    
    public function ajax_locksbyip_get_all(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);
        
        $parameters = array();
        
        // 22-06-2022 avc2 - dllGlobalIsapi.dll/LoockByIp
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/blacklistipIsapi.dll/blacklistip", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/LoockByIp', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        //$data = $json->data;
        
        //$json = json_decode(Storage::disk('public')->get('/locksbyip.json'));
        
        echo json_encode($json->data);
    }
    
}
