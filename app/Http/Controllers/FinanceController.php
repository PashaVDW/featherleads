<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinanceRequest;

class FinanceController extends Controller
{
    public function index()
    {
        return view('finance.index');
    }

    public function store(FinanceRequest $request)
    {

        return response()->json(['success' => true, 'message' => 'Form successfully submitted!']);
    }
}
