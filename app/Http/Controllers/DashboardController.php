<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DashboardController extends Controller {

    public function __construct() {
        //$this->middleware('auth')->except('logout');
        //JLMA$this->middleware('auth.custom');
    }

    public function logout(Request $request) {
        auth()->logout();

        //$this->guard()->logout();
        $request->session()->invalidate();
        //$request->session()->regenerateToken();

        return redirect('/login');
    }

    public function index() {
        $actualDate = date("d-m-Y");
        $lastMonth = date("d-m-Y");

        $data = array(
            'FechaFin' => $actualDate,
            'FechaIni' => $lastMonth,
            'TipoOper' => 200
        );

        return view('dashboard')->with('data', $data);
    }

    public function call() {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array('FechaIni' => '2021-05-01',
            'FechaFin' => '2021-05-30');

        $result = $client->request('POST', config('app.api_host') . '/transactions/Totals', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);

        echo $body;
    }

    public function get_all() {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array();

        $result = $client->request('POST', config('app.api_host') . '/backoffice/devices/GetAll', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);

        echo $body;
    }

    public function ajax_transactions_totals(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array('FechaIni' => (date('Y-m-d', strtotime($request->input('fechaIni'))) == null ? '2021-05-27' : date('Y-m-d', strtotime($request->input('fechaIni'))) ),
            'FechaFin' => (date('Y-m-d', strtotime($request->input('fechaFin'))) == null ? '2021-05-27' : date('Y-m-d', strtotime($request->input('fechaFin'))) )
        );

        $result = $client->request('POST', config('app.api_host') . '/transactions/Totals', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);

        $list = array_values($json->data);

        $array_tipo_oper = array('Venta' => 200, 'Anulación' => 420, 'Reverso' => 400, 'Reembolso' => 220);

        array_walk_recursive($list, function(&$value, $key) use ($array_tipo_oper) {
            $value = (object) ['TipoOper' => ucfirst(array_search($value->TipoOper, $array_tipo_oper)),
                        'Cantidad' => $value->Cantidad,
                        'Codigo' => $value->TipoOper];
        }, $array_tipo_oper);

        $json->data = $list;
        echo json_encode($json);
    }

    public function ajax_transactions_totals_per_operation(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array('FechaIni' => (date('Y-m-d', strtotime($request->input('fechaIni'))) == null ? '2021-05-01' : date('Y-m-d', strtotime($request->input('fechaIni'))) ),
            'FechaFin' => (date('Y-m-d', strtotime($request->input('fechaFin'))) == null ? '2021-05-30' : date('Y-m-d', strtotime($request->input('fechaFin'))) ),
            'TipoOper' => ($request->input('tipoOper') == null ? 200 : $request->input('tipoOper') )
        );

        $result = $client->request('POST', config('app.api_host') . '/transactions/TotalsByMti', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);

        echo $body;
    }

    public function ajax_transactions_totals_per_operation_table(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array('FechaIni' => (date('Y-m-d', strtotime($request->input('fechaIni'))) == null ? '2021-05-01' : date('Y-m-d', strtotime($request->input('fechaIni'))) ),
            'FechaFin' => (date('Y-m-d', strtotime($request->input('fechaFin'))) == null ? '2021-05-30' : date('Y-m-d', strtotime($request->input('fechaFin'))) ),
            'TipoOper' => ($request->input('tipoOper') == null ? 200 : $request->input('tipoOper') )
        );

        $result = $client->request('POST', config('app.api_host') . '/transactions/TotalsByMti', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);

        $lista = array_column($json->data, 'Cantidad');
        $_sum = array_sum($lista);
        $list = array();

        foreach ($json->data as $key => $value) {
            $value->Porcentaje = round(( $lista[$key] * 100 ) / $_sum, 2);
            $list[] = $value;
        }

        $json->data = $list;

        $homologacion = array(5 => 'Dato errado al validar la tarjeta',
            30 => 'Error de formato',
            36 => 'Tarjeta Restringuida',
            39 => 'Monto no autorizado',
            57 => 'Transaccion no permitida',
            58 => 'Transaccion no permitida por el dispositivo',
            75 => 'Entrada maxima de PIN excedidos',
            91 => 'El emisor no esta operativo'
        );

        array_walk_recursive($json->data, 'self::updateValue', $homologacion);

        echo json_encode($json);
    }

    public function updateValue($data, $key, $homologacion) {
        if (array_key_exists($data->CodResp, $homologacion)) {
            $data->DesResp = $homologacion[$data->CodResp];
        }
    }

    public function ajax_transactions_totals_per_operation_terminal(Request $request) {
        $headers = [
            'Content-Type' => 'application/json',
            'MobiPay-Token' => 'cb82c6f6e424a9aa3f4b79d122ec0b99'
        ];

        $client = new Client([
            'headers' => $headers
        ]);

        $parameters = array('FechaIni' => (date('Y-m-d', strtotime($request->input('fechaIni'))) == null ? '2021-05-01' : date('Y-m-d', strtotime($request->input('fechaIni'))) ),
            'FechaFin' => (date('Y-m-d', strtotime($request->input('fechaFin'))) == null ? '2021-05-30' : date('Y-m-d', strtotime($request->input('fechaFin'))) ),
            'TipoOper' => ($request->input('tipoOper') == null ? 200 : $request->input('tipoOper') ),
            'Serial' => ($request->input('serial') == null ? '' : $request->input('serial') ),
        );

        $result = $client->request('POST', config('app.api_host') . '/transactions/TotalsByMtiAndId', [
            'auth' => ['M0b1lP@yUs3R', '$%qasweWQ@!#'], 'body' => json_encode($parameters)
        ]);

        $code = $result->getStatusCode();
        $body = $result->getBody();
        $json = json_decode($body);

        echo $body;
    }

}
