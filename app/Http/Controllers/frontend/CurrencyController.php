<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function changeCurrency($currency)
    {
        // Validate and store the currency in the session
        $availableCurrencies = ['USD', 'EUR', 'GBP']; // Define your available currencies
        if (in_array($currency, $availableCurrencies)) {
            session(['currency' => $currency]);
        }

        // Optionally, redirect back to the previous page
        return redirect()->back();
    }
}
