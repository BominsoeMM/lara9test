<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OneController extends Controller
{
    public function exChange(Request $request){
//        return $request->photo;
        $newName = uniqid().'_'.$request->file('photo')->getClientOriginalName();
        $filename = $request->photo->storeAs("images",$newName);
        return $filename;
//       $currency = Http::get('https://forex.cbm.gov.mm/api/latest')->object()->rates;
//       $rate = str_replace(',','',$currency->{strtoupper($request->currency)});
//       $exChanges = $request->amount * $rate . ' MMK';
//       return compact($exChanges);
    }
}
