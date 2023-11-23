<?php

namespace App\Services;

use Illuminate\Http\Request;

class CurrencyService
{
    public function conversion(array $data)
    {
        $exchangeRate = config('exchangerate.currencies')[$data['source']];

        $amount = str_replace(['$', ','], '', $data['amount']);
        $amount = round($amount * $exchangeRate[$data['target']], 2);

        $response = [
            'msg' => 'success',
            'amount' => '$' . $amount,
        ];

        return $response;
    }
}
