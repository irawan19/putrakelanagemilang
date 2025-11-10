<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aplikasi;
use App\Models\Kontak;
use GuzzleHttp\Client;

class KatalogController extends Controller {
    
    public function index()
    {
        $data['aplikasi']          = cache()->remember('aplikasi_data', 3600, function() { return Aplikasi::first(); });
        $data['kontak']             = cache()->remember('kontak_data', 3600, function() { return Kontak::first(); });
        $api_katalog                = new Client(['http_errors' => false, 'timeout' => 10, 'connect_timeout' => 5]);
        
        try {
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
                $data['katalogs']          = (object)['data' => []];
            }
        } catch (\Exception $e) {
            $data['katalogs']          = (object)['data' => []];
        }
        
        return view('katalog',$data);
    }

}