<?php

namespace Database\Seeders;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProvinsiKotaSeeder extends Seeder
{
    public function run()
    {
        // Daftar ID provinsi di pulau Jawa
        $provinsiJawa = [5, 6, 9, 10, 11, 12];

        // Ambil data provinsi dari API RajaOngkir
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY')
        ])->get('https://api.rajaongkir.com/starter/province');

        $provinces = $response->json()['rajaongkir']['results'];

        // Simpan data provinsi ke database
        foreach ($provinces as $province) {
            if (in_array($province['province_id'], $provinsiJawa)) {
                $provinsi = Provinsi::updateOrCreate(
                    ['id' => $province['province_id']],
                    ['nama' => $province['province']]
                );

                // Ambil data kota untuk setiap provinsi
                $response = Http::withHeaders([
                    'key' => env('RAJAONGKIR_API_KEY')
                ])->get("https://api.rajaongkir.com/starter/city?province={$province['province_id']}");

                $cities = $response->json()['rajaongkir']['results'];

                // Jika provinsi bukan Jawa Timur, batasi kota hingga 15
                if ($province['province_id'] != 12) {
                    $cities = array_slice($cities, 0, 15);
                }

                // Simpan data kota ke database
                foreach ($cities as $city) {
                    // Periksa apakah kota dengan nama yang sama sudah ada di database
                    if (!Kota::where('nama', $city['city_name'])->where('provinsi_id', $provinsi->id)->exists()) {
                        Kota::create([
                            'id' => $city['city_id'],
                            'nama' => $city['city_name'],
                            'provinsi_id' => $provinsi->id
                        ]);
                    }
                }
            }
        }
    }
}
