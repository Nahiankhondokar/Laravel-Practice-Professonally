<?php

namespace App\Services\CurrencyConverter;

interface CurrencyConverterInterface
{

    function currencyConverter(string $from, string $to, int $amount): float;

}