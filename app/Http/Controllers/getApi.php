<?php

namespace App\Http\Controllers;

use App\City;
use App\Province;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class getApi extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

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

        if ($request->origin && $request->destination && $request->weight && $request->courier) {
            $origin = $request->origin; // kota asal yanbg ingin kita kirim
            $destination = $request->destination;
            $weight = $request->weight;
            $courier = $request->courier;
        }

        $response = Http::asForm()->withHeaders([
            'key' => 'd19c27e0d7ff4966d18cc47ddd5900ae'
        ])->post('https://api.rajaongkir.com/starter/cost', [
                    'origin' => $origin,
                    'destination' => $destination,
                    'weight' => $weight,
                    'courier' => $courier,
                ]);

        if ($response->successful() && isset($response['rajaongkir']['results'])) {
            $cekongkir = $response['rajaongkir']['results'][0]['costs'];
            // dd($response['rajaongkir']['results'][0]);
        } else {
            $cekongkir = null; // Atau handle error sesuai kebutuhan Anda
        }

        // Lanjutkan untuk mengirimkan data ke view
        $provinsi = Province::all();
        return view('ongkir', compact('provinsi', 'cekongkir'));
    }

    public function ajax($id)
    {
        $cities = City::where('province_id', '=', $id)->pluck('city_name', 'id');
        // return json_encode($cities);
        return response()->json($cities);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $origin = $request->origin; // kota asal yanbg ingin kita kirim
        $destination = $request->destination;
        $weight = $request->weight;
        $courier = $request->courier;
        $response = Http::asForm()->withHeaders([
            'key' => 'd19c27e0d7ff4966d18cc47ddd5900ae'
        ])->post('https://api.rajaongkir.com/starter/cost', [
                    'origin' => $origin, // kota awal yanbg ingin kita kirim
                    'destination' => $destination, // kota tujuan
                    'weight' => $weight,
                    'courier' => $courier
                ]);

        return $response['rajaongkir']['results'][0];
    }
}
