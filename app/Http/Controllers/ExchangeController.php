<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExchangeController extends Controller
{
    public function Exchange(Request $request)
    {
        $rate = Http::get('https://forex.cbm.gov.mm/api/latest')->object()->rates;
        $formCurrencyrate = str_replace(',', '', $rate->{strtoupper($request->formCurrency)});
        $toCurrencyrate = str_replace(',', '', $rate->{strtoupper($request->toCurrency)});
        $mmk = $request->amount * $formCurrencyrate;
        $result = round($mmk / $toCurrencyrate, 2) . " " . strtoupper($request->toCurrency);
        $record = new Record();
        $record->input = $request->amount . " " . strtoupper($request->formCurrency);
        $record->output = $result;
        $record->save();

        return view('exchange-result', [
            "amount" => $request->amount,
            "formCurrency" => $request->formCurrency,
            "result" => $result,
            "records" => $record->all()
        ]);
    }
}
