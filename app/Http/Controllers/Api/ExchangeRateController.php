<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;

class ExchangeRateController extends Controller
{
    /**
     * Get exchange rate between two currencies
     */
    public function getRate(Request $request)
    {
        $request->validate([
            'from' => 'required|string|size:3',
            'to' => 'required|string|size:3'
        ]);

        $fromCurrency = strtoupper($request->from);
        $toCurrency = strtoupper($request->to);

        $rate = ExchangeRate::getRate($fromCurrency, $toCurrency);

        if ($rate === null) {
            return response()->json([
                'error' => 'Exchange rate not available',
                'message' => "Rate from {$fromCurrency} to {$toCurrency} not found"
            ], 404);
        }

        return response()->json([
            'from' => $fromCurrency,
            'to' => $toCurrency,
            'rate' => $rate,
            'last_updated' => ExchangeRate::where('from_currency', $fromCurrency)
                                         ->where('to_currency', $toCurrency)
                                         ->first()
                                         ?->fetched_at
                                         ?->toISOString()
        ]);
    }

    /**
     * Get all available currencies
     */
    public function getCurrencies()
    {
        $currencies = ExchangeRate::getAvailableCurrencies();

        return response()->json([
            'currencies' => $currencies,
            'count' => $currencies->count()
        ]);
    }

    /**
     * Get multiple exchange rates at once
     */
    public function getRates(Request $request)
    {
        $request->validate([
            'base' => 'required|string|size:3',
            'targets' => 'required|array',
            'targets.*' => 'string|size:3'
        ]);

        $baseCurrency = strtoupper($request->base);
        $targetCurrencies = array_map('strtoupper', $request->targets);

        $rates = [];
        foreach ($targetCurrencies as $target) {
            $rate = ExchangeRate::getRate($baseCurrency, $target);
            if ($rate !== null) {
                $rates[$target] = $rate;
            }
        }

        return response()->json([
            'base' => $baseCurrency,
            'rates' => $rates,
            'last_updated' => ExchangeRate::orderBy('fetched_at', 'desc')
                                         ->first()
                                         ?->fetched_at
                                         ?->toISOString()
        ]);
    }

    /**
     * Convert amount between currencies
     */
    public function convert(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'from' => 'required|string|size:3',
            'to' => 'required|string|size:3'
        ]);

        $amount = $request->amount;
        $fromCurrency = strtoupper($request->from);
        $toCurrency = strtoupper($request->to);

        $rate = ExchangeRate::getRate($fromCurrency, $toCurrency);

        if ($rate === null) {
            return response()->json([
                'error' => 'Conversion not available',
                'message' => "Rate from {$fromCurrency} to {$toCurrency} not found"
            ], 404);
        }

        $convertedAmount = $amount * $rate;

        return response()->json([
            'from_amount' => $amount,
            'from_currency' => $fromCurrency,
            'to_amount' => round($convertedAmount, 2),
            'to_currency' => $toCurrency,
            'rate' => $rate,
            'last_updated' => ExchangeRate::where('from_currency', $fromCurrency)
                                         ->where('to_currency', $toCurrency)
                                         ->first()
                                         ?->fetched_at
                                         ?->toISOString()
        ]);
    }
}
