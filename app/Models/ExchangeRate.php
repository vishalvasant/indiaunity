<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ExchangeRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_currency',
        'to_currency',
        'rate',
        'fetched_at'
    ];

    protected $casts = [
        'rate' => 'decimal:8',
        'fetched_at' => 'datetime'
    ];

    /**
     * Get exchange rate between two currencies
     */
    public static function getRate($fromCurrency, $toCurrency)
    {
        // If same currency, return 1
        if ($fromCurrency === $toCurrency) {
            return 1.0;
        }

        // Try to find direct rate
        $rate = self::where('from_currency', $fromCurrency)
                   ->where('to_currency', $toCurrency)
                   ->first();

        if ($rate) {
            return (float) $rate->rate;
        }

        // Try reverse rate
        $reverseRate = self::where('from_currency', $toCurrency)
                          ->where('to_currency', $fromCurrency)
                          ->first();

        if ($reverseRate) {
            return 1 / (float) $reverseRate->rate;
        }

        // If no direct rate found, try via USD
        $fromToUsd = self::getRate($fromCurrency, 'USD');
        $usdToTarget = self::getRate('USD', $toCurrency);

        if ($fromToUsd && $usdToTarget) {
            return $fromToUsd * $usdToTarget;
        }

        return null;
    }

    /**
     * Fetch and store exchange rates from API
     */
    public static function fetchAndStoreRates()
    {
        try {
            $apiKey = 'fca_live_QEPtZzNQajMKh38MfAUigh2Th7coe0GHDBHHLecL';
            $apiUrl = 'https://api.freecurrencyapi.com/v1/latest';

            Log::info('Fetching exchange rates from API...');

            $response = Http::get($apiUrl, [
                'apikey' => $apiKey
            ]);

            if (!$response->successful()) {
                throw new \Exception('API request failed: ' . $response->status());
            }

            $data = $response->json();

            if (!isset($data['data'])) {
                throw new \Exception('Invalid API response format');
            }

            $rates = $data['data'];
            $fetchedAt = now();

            // Add fixed rates for currencies not in API
            $rates['AED'] = 3.6725; // Fixed USD to AED rate
            $rates['SAR'] = 3.75;   // Fixed USD to SAR rate

            // Store all currency pairs
            $storedCount = 0;
            foreach ($rates as $currency => $rate) {
                if ($currency === 'USD') continue; // Skip USD as base

                // Store direct rate from USD
                self::updateOrCreate(
                    ['from_currency' => 'USD', 'to_currency' => $currency],
                    ['rate' => $rate, 'fetched_at' => $fetchedAt]
                );

                // Store reverse rate to USD
                self::updateOrCreate(
                    ['from_currency' => $currency, 'to_currency' => 'USD'],
                    ['rate' => 1 / $rate, 'fetched_at' => $fetchedAt]
                );

                $storedCount++;
            }

            // Store cross-currency rates for our supported currencies
            $supportedCurrencies = ['AED', 'USD', 'EUR', 'GBP', 'SAR', 'INR', 'PKR', 'BDT', 'LKR'];
            
            foreach ($supportedCurrencies as $from) {
                foreach ($supportedCurrencies as $to) {
                    if ($from === $to) continue;

                    if (isset($rates[$from]) && isset($rates[$to])) {
                        $crossRate = $rates[$to] / $rates[$from];
                        
                        self::updateOrCreate(
                            ['from_currency' => $from, 'to_currency' => $to],
                            ['rate' => $crossRate, 'fetched_at' => $fetchedAt]
                        );
                    }
                }
            }

            Log::info("Exchange rates updated successfully. Stored rates for {$storedCount} currencies.");
            
            return true;

        } catch (\Exception $e) {
            Log::error('Failed to fetch exchange rates: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Check if rates need to be updated (older than 24 hours)
     */
    public static function needsUpdate()
    {
        $latestRate = self::orderBy('fetched_at', 'desc')->first();
        
        if (!$latestRate) {
            return true; // No rates exist
        }

        return $latestRate->fetched_at->lt(Carbon::now()->subHours(24));
    }

    /**
     * Get all available currencies
     */
    public static function getAvailableCurrencies()
    {
        return self::select('from_currency')
                  ->distinct()
                  ->pluck('from_currency')
                  ->sort()
                  ->values();
    }
}
