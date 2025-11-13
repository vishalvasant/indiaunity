<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ExchangeRate;

class FetchExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange-rates:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store exchange rates from API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fetching exchange rates from API...');

        if (ExchangeRate::fetchAndStoreRates()) {
            $this->info('Exchange rates updated successfully!');
            
            // Show some sample rates
            $this->table(
                ['From', 'To', 'Rate', 'Updated At'],
                [
                    ['USD', 'INR', ExchangeRate::getRate('USD', 'INR'), now()],
                    ['AED', 'INR', ExchangeRate::getRate('AED', 'INR'), now()],
                    ['EUR', 'INR', ExchangeRate::getRate('EUR', 'INR'), now()],
                    ['GBP', 'INR', ExchangeRate::getRate('GBP', 'INR'), now()],
                ]
            );
        } else {
            $this->error('Failed to fetch exchange rates from API');
            return 1;
        }

        return 0;
    }
}
