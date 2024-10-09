<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OngkirController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cek-ongkir', [OngkirController::class, 'index'])->name('index');
Route::post('/cek-ongkir', [OngkirController::class, 'cek_ongkir'])->name('cek-ongkir');

// Route::get('/list-provinsi', function () {
//     $response = Http::withHeaders([
//         'key' => 'a30370c12a1fe9a76b3695c85374d25f',
//     ])->get('https://api.rajaongkir.com/starter/province');

//     dd($response->json()['rajaongkir']['results']);
// });