<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function index(){
        $data = Http::withHeaders([
            'key' => 'a30370c12a1fe9a76b3695c85374d25f'
        ])->get('https://api.rajaongkir.com/starter/city');

        $city = $data['rajaongkir']['results'];
        return view('cek-ongkir', ['cities' => $city, 'ongkir' => '']);
    }

    public function cek_ongkir(Request $request){
        $data = Http::withHeaders([
            'key' => 'a30370c12a1fe9a76b3695c85374d25f'
        ])->get('https://api.rajaongkir.com/starter/city');
        
        $cost = Http::withHeaders([
            'key' => 'a30370c12a1fe9a76b3695c85374d25f'
            ])->post('https://api.rajaongkir.com/starter/cost',[
                'origin' => $request->origin,
                'destination' => $request->destination,
                'weight' => $request->weight,
                'courier' => $request->courier
            ]);
        $city = $data['rajaongkir']['results'];
        $total_cost = $cost['rajaongkir']['results'];
        return view('cek-ongkir', ['cities' => $city, 'ongkir' => $total_cost]);
    }
}
