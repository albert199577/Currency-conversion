<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CurrencyController extends Controller
{
    public function conversion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source' => ['required', 'string', Rule::in(['TWD', 'JPY', 'USD'])],
            'target' => ['required', 'string', Rule::in(['TWD', 'JPY', 'USD'])],
            'amount' => ['required', 'string', 'regex:/^\$[1-9]\d{0,2}(,\d{3})*$/'],
        ]);
    }
}
