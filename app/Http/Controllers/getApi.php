<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class getApi extends Controller
{
    public function index()
    {
        // untuk mengambil data provinsi
        // $response = Http::withHeaders([
        //     'key' => 'd19c27e0d7ff4966d18cc47ddd5900ae'
        // ])->get('https://api.rajaongkir.com/starter/province');
        // return $response->body();
        // return $response['rajaongkir']['results'];

        // untuk mengambil data city
        // $response = Http::withHeaders([
        //     'key' => 'd19c27e0d7ff4966d18cc47ddd5900ae'
        // ])->get('https://api.rajaongkir.com/starter/city');
        // return $response->json();
        //  return $response['rajaongkir']['results'];

        // untuk mengambil data cost
        $origin = 501; // kota asal yanbg ingin kita kirim
        $destination = 114;
        $weight = 1700;
        $courier = "jne";
        $response = Http::asForm()->withHeaders([
            'key' => 'd19c27e0d7ff4966d18cc47ddd5900ae'
        ])->post('https://api.rajaongkir.com/starter/cost', [
                    'origin' => $origin, // kota asal yanbg ingin kita kirim
                    'destination' => $destination,
                    'weight' => $weight,
                    'courier' => $courier
                ]);
        // return $response->json();
        // return $response['rajaongkir']['results'];
        return view('ongkir');
    }
}
