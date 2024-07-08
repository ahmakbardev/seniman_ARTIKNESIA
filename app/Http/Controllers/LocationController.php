<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class LocationController extends Controller
{
    public function getProvinces()
    {
        $provinces = Provinsi::all();
        return response()->json($provinces);
    }

    public function getCities($provinceId)
    {
        $cities = Kota::where('provinsi_id', $provinceId)->get();
        return response()->json($cities);
    }
}
