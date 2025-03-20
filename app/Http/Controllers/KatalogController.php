<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use GuzzleHttp\Client;

class KatalogController extends Controller {
    
    public function index()
    {
        $data['aplikasi']          = Aplikasi::first();
        $api_katalog                = new Client(['http_errors' => false]);
        $response                   = $api_katalog->request(
            "GET",
            "https://penawaran.putrakelanagemilang.com/api/barang/0",
            [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Content-Type'  => 'application/json',
                ]
            ]
        );
        if($response->getStatusCode() == 200) {
            $data['katalogs']          = json_decode($response->getBody());
        } else {
            $data['katalogs']          =  array();
        }
        return view('katalog',$data);
    }

}

?>