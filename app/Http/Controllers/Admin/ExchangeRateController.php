<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Artisan;

class ExchangeRateController extends Controller
{
    /**
     * Display exchange rates
     */
    public function index()
    {
        $latestUpdate = ExchangeRate::orderBy('fetched_at', 'desc')->first();
        $needsUpdate = ExchangeRate::needsUpdate();
        
        // Get sample rates for display
        $sampleRates = [
            ['from' => 'USD', 'to' => 'INR'],
            ['from' => 'AED', 'to' => 'INR'],
            ['from' => 'EUR', 'to' => 'INR'],
            ['from' => 'GBP', 'to' => 'INR'],
            ['from' => 'SAR', 'to' => 'INR'],
        ];
        
        $rates = [];
        foreach ($sampleRates as $pair) {
            $rate = ExchangeRate::getRate($pair['from'], $pair['to']);
            if ($rate) {
                $rates[] = [
                    'from' => $pair['from'],
                    'to' => $pair['to'],
                    'rate' => $rate,
                    'formatted_rate' => number_format($rate, 4)
                ];
            }
        }
        
        $availableCurrencies = ExchangeRate::getAvailableCurrencies();
        
        return view('admin.exchange-rates.index', compact(
            'latestUpdate', 
            'needsUpdate', 
            'rates', 
            'availableCurrencies'
        ));
    }
    
    /**
     * Manually refresh exchange rates
     */
    public function refresh(Request $request)
    {
        try {
            // Run the command to fetch rates
            Artisan::call('exchange-rates:fetch');
            
            return redirect()
                ->route('admin.exchange-rates.index')
                ->with('success', 'Exchange rates have been updated successfully!');
                
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.exchange-rates.index')
                ->with('error', 'Failed to update exchange rates: ' . $e->getMessage());
        }
    }
}
