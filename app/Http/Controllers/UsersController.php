<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
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
     * Show users list.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('users.list');
    }
    
    /**
     * Show the application user.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $json = Storage::disk('public')->get('/categories.json');
        $json = json_decode($json);
        $data1 = $json->data;
        
        /////////////////////// Aggregator 
//        $json = Storage::disk('public')->get('/aggregator.json');
//        $json = json_decode($json);
//        $data2 = $json->data;
        
        $headers = [
        'Content-Type' => 'application/json',
        'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array();

        $result = $client->request('POST', 'https://payment.globalconnection.tech/backoffice/aggregatorisapi.dll/aggregator', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);
        $data2 = $json->data;

        $json = Storage::disk('public')->get('/turns.json');
        $json = json_decode($json);
        $data3 = $json->data;
        $json = Storage::disk('public')->get('/processors.json');
        $json = json_decode($json);
        $data4 = $json->data;
        
        $data = array(
            'categories' => (array) $data1,
            'aggregator' => (array) $data2,
            'turns' => (array) $data3,
            'processors' => (array) $data4
            );
        
        return view('users.edit')->with('data',$data);
    }
    
    public function ajax_users_get_all(Request $request) {
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

//        $result = $client->request('POST', config('app.api_host') . '/GetUsers', [
//            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
//        ]);
//
//        $code = $result->getStatusCode();
//        $body = $result->getBody();
//        $json = json_decode($body);
        
        $json = json_decode(Storage::disk('public')->get('/users.json'));
        
        echo json_encode($json->data);
    }
    
}