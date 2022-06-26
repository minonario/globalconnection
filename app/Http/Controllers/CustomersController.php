<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class CustomersController extends Controller
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
        return view('customers.list');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function edit(){
        
        $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client(['verify' => false,
            'headers' => $headers
        ]);
        
        //22-06-2022 avc2 -- categories
        $parameters = array();
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/categories', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);
        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        
        $data1 = $json->data;
//        $json = Storage::disk('public')->get('/categories.json');
//        $json = json_decode($json);
        
        //22-06-2022 avc2 -- aggregator
        $parameters = array();
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/aggregator', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);
        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        
        $data2 = $json->data;
        //$json = Storage::disk('public')->get('/aggregator.json');
        //$json = json_decode($json);
        
        //22-06-2022 avc2 -- turns
        $parameters = array();
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/Turns', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);
        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        
        $data3 = $json->data;
//        $json = Storage::disk('public')->get('/turns.json');
//        $json = json_decode($json);
        
        //22-06-2022 avc2 -- processors
        $parameters = array();
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/processors', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);
        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        
        $data4 = $json->data;
//        $json = Storage::disk('public')->get('/processors.json');
//        $json = json_decode($json);
        
        $data = array(
            'categories' => (array) $data1,
            'aggregator' => (array) $data2,
            'turns' => (array) $data3,
            'processors' => (array) $data4
            );
        
        return view('customers.edit')->with('data',$data);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function create(){
        $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client(['verify' => false,
            'headers' => $headers
        ]);
        
        $json = Storage::disk('public')->get('/categories.json');
        $json = json_decode($json);
        $data1 = $json->data;
        
        //AGGREGATOR - 22-06-2022 avc2
        $parameters = array(); 
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/aggregatorisapi.dll/aggregator", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/aggregator', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => '' //json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data2 = $json->data;
        
//        $json = Storage::disk('public')->get('/aggregator.json');
//        $json = json_decode($json);
//        $data2 = $json->data;

        
        // TURNS - 22-06-2022 avc2
        $parameters = array();
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/TurnsIsapi.dll/Turns", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/Turns', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data3 = $json->data;
        
//        $json = Storage::disk('public')->get('/turns.json');
//        $json = json_decode($json);
//        $data3 = $json->data;
        
        // PROCESSORS - 22-06-2022 avc2
        $parameters = array();
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/TurnsIsapi.dll/Turns", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/processors', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data4 = $json->data;
        
//        $json = Storage::disk('public')->get('/processors.json');
//        $json = json_decode($json);
//        $data4 = $json->data;
        
        $data = array(
            'categories' => (array) $data1,
            'aggregator' => (array) $data2,
            'turns' => (array) $data3,
            'processors' => (array) $data4
            );
        
        return view('customers.create')->with('data',$data);
    }
    
    public function ajax_customers_get_all(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);
        
        $parameters = array();
        
        // 22-06-2022 avc2 - customerskeys
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/customers_keysIsapi.dll/customerskeys", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/customerskeys', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data = $json->data;
        
        //$json = json_decode(Storage::disk('public')->get('/customers_keys.json'));
        
        /*$list = collect($json->data);
        $search = $request->input('search');
        $filtered = $list->where('NombreComercio', $search['value']);
        $filtered->all();*/
        
        echo json_encode($data);
    }
    
    public function ajax_processors_get_all(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);
        
        $parameters = array();
        // PROCESSORS - 22-06-2022 avc2
        //$result = $client->request('POST', "https://payment.globalconnection.tech/backoffice/processorsIsapi.dll/processors", [
        $result = $client->request('GET', config('app.api_host_qa') . '/dllGlobalIsapi.dll/processors', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data = $json->data;
        
        //$json = json_decode(Storage::disk('public')->get('/processors.json'));
        
        echo json_encode($data);
    }
}