<?php

namespace Tests\Unit;

use Tests\TestCase;
use  App\Services\CurrencyService;

class CurrencyTest extends TestCase
{
    private $currencyService;

    public function setUp(): void
    {
        parent::setUp();

        $this->currencyService = new CurrencyService();
    }

    /**
     * A Confirm currency conversion is correct
     *
     * @return void
     */
    public function test_currency_conversion_correct()
    {
        $data = [
            'source' => 'USD',
            'target' => 'TWD',
            'amount' => '$10,050',
        ];
        $exchangeRate =  config('exchangerate.currencies')[$data['source']];
        $amount = str_replace(['$', ','], '', $data['amount']);

        $response = $this->currencyService->conversion($data);
        $this->assertEquals('success', $response['msg']);

        $this->assertEquals('$' . $amount * $exchangeRate[$data['target']], $response['amount']);
    }
}
