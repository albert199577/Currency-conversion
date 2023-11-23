<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use  App\Services\CurrencyService;

class CurrencyController extends Controller
{
    private $currencyService;
    
    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function conversion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source' => ['required', 'string', Rule::in(['TWD', 'JPY', 'USD'])],
            'target' => ['required', 'string', Rule::in(['TWD', 'JPY', 'USD'])],
            'amount' => ['required', 'string', 'regex:/^\$[1-9]\d{0,2}(,\d{3})*$/'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $validator->validated();
        $response = $this->currencyService->conversion($data);

        return response()->json($response, 200);
    }
}
