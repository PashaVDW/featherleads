<?php

namespace App\Http\Controllers;

use App\Http\Requests\RPCRequest;
use App\Http\Requests\SalesMonthlyTargetRequest;
use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SalesController extends Controller
{
    public function index(): View
    {
        $sale = Sale::where('user_id', Auth::id())->firstOrFail();

        return view('sales.index', [
            'sale' => $sale,
            'toGoValue' => $sale->target_amount - $sale->sold,
            'sold' => $sale->sold,
        ]);
    }

    public function setMonthlyTarget(SalesMonthlyTargetRequest $request): RedirectResponse
    {
        $salesId = Sale::where('user_id', Auth::id());

        $salesId->update([
            'target_amount' => $request->get('target_amount'),
        ]);

        return redirect()->route('sales.index')->with('success', 'Monthly Target updated successfully!');
    }

    public function addSale()
    {
        $sale = Sale::where('user_id', Auth::id())->firstOrFail();

        $sale->update([
            'sold' => ($sale->sold + $sale->cost_per_customer),
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale added successfully!');
    }

    public function setRPCAmount(RPCRequest $request): RedirectResponse
    {
        $salesId = Sale::where('user_id', Auth::id());

        $salesId->update([
            'cost_per_customer' => $request->get('rpc'),
        ]);

        return redirect()->route('sales.index')->with('success', 'RPCAmount updated successfully!');
    }
}
