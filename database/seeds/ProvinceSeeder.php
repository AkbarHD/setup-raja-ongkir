<?php

use App\Province;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
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
        ])->get('https://api.rajaongkir.com/starter/province');
        // return $response->body();
        $provinces = $response['rajaongkir']['results'];

        foreach ($provinces as $province) {
            Province::create([
                'id' => $province['province_id'],
                'province' => $province['province'],
                'created_at' => null, // jika tidak di inisialisasikan, maka terisi otomatis
                'updated_at' => null // jika tidak di inisialisasikan, maka terisi otomatis
            ]);

            // $data_province = [
            //     'id' => $province['province_id'],
            //     'province' => $province['province']
            // ]; tidak bisa

            // $data_province[] = [
            //     'id' => $province['province_id'],
            //     'province' => $province['province']
            // ]; // pake ini bisa
        }

        // Province::insert($data_province); // lanjut ke sini
    }
}
