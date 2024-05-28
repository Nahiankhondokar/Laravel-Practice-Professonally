<?php 

namespace App\Services\CurrencyConverter;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class CurrencyApiService implements CurrencyConverterInterface 
{
    
    function currencyConverter(string $from, string $to, int $amount): float
    {
        $currencyApiKey = config('app.currency_api.key');
        $rates = Cache::remember('currenct_rates', now()->addHours(12), function() use ($currencyApiKey){
            $response = Http::get("https://api.currencyapi.com/v3/latest?apikey={$currencyApiKey}&currencies=EUR%2CUSD%2CCAD");
            if($response->ok()){
                $rates = $response->json()['data'];
                return $rates;
            }else {
                throw new RuntimeException('Currenct API error');
            }
        });

        return round($rates[$to]['value']*$amount, 2);
    }
}