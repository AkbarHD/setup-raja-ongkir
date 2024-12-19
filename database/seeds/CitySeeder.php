<?php

use App\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = Http::withHeaders([
            'key' => 'd19c27e0d7ff4966d18cc47ddd5900ae'
        ])->get('https://api.rajaongkir.com/starter/city');
        // return $response->json();
        $cities = $response['rajaongkir']['results'];

        foreach ($cities as $city) {
            City::create([
                'id' => $city['city_id'],
                'province_id' => $city['province_id'],
                'type' => $city['type'],
                'city_name' => $city['city_name'],
                'postal_code' => $city['postal_code'],
                'created_at' => null, // jika tidak di inisialisasikan, maka terisi otomatis
                'updated_at' => null // jika tidak di inisialisasikan, maka terisi otomatis
            ]);
        }

    }
}
