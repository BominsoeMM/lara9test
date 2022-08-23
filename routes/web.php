<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\OneController;
use  App\Http\Controllers\ExchangeController;
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

Route::post('/exchange',[ExchangeController::class,'Exchange'])->name('exchange');
Route::view('/exchange-result','exchange')->name('exchange-result');
Route::get('/about',function (){
    return view('about');
});

Route::get('product',function (){
    $products = Http::get('https://fakestoreapi.com/products')->object();
//    $products = json_decode($products);
//$products = array_filter($products,fn($product)=>$product->price < 10);
dd($products[5]->price);
});

Route::post('/exchange-to-mmk',[OneController::class,'exChange'])->name('exchange-to-mmk');

Route::get('product/max-amount/{price}', function ($price){
    $products = Http::get('https://fakestoreapi.com/products')->object();
    $response = collect([$products])->where("price","<",$price);
    return $response;
});

Route::post('exchenge',[ExchangeController::class,'Exchange'])->name('exchange');

Route::get('/exchange/form/{amount}/{formCurrency}/to/{toCurrency}',
    function ($amount ,$formCurrency, $toCurrency){
    $rate = Http::get('https://forex.cbm.gov.mm/api/latest')->object()->rates;
    $formCurrencyrate = str_replace(',','',$rate->{strtoupper($formCurrency)});
    $toCurrencyrate = str_replace(',','',$rate->{strtoupper($toCurrency)});
    $mmk = $amount * $formCurrencyrate;
    return round($mmk / $toCurrencyrate, 2).$toCurrency;
}

);

