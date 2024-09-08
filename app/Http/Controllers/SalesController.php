<?php

namespace App\Http\Controllers;

use App\Http\Requests\RPCRequest;
use App\Http\Requests\SalesMonthlyTargetRequest;
use App\Models\Sale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SalesController extends Controller
{
    protected $sale;

    public function __construct()
    {
        $this->sale = Sale::where('user_id', Auth::id())->firstOrFail();
    }

    public function index(): View
    {
        $monthlyData = $this->generateMonthlyData();

        return view('sales.index', [
            'sale' => $this->sale,
            'toGoValue' => $this->sale->target_amount - $this->sale->sold,
            'sold' => $this->sale->sold,
            'monthlyData' => $monthlyData,
        ]);
    }

    public function setMonthlyTarget(SalesMonthlyTargetRequest $request): RedirectResponse
    {
        $this->sale->update([
            'target_amount' => $request->get('target_amount'),
        ]);

        return redirect()->route('sales.index')->with('success', 'Monthly Target updated successfully!');
    }

    public function addSale(): RedirectResponse
    {
        $this->sale->increment('sold', $this->sale->cost_per_customer);

        return redirect()->route('sales.index')->with('success', 'Sale added successfully!');
    }

    public function setRPCAmount(RPCRequest $request): RedirectResponse
    {
        $this->sale->update([
            'cost_per_customer' => $request->get('rpc'),
        ]);

        return redirect()->route('sales.index')->with('success', 'RPC Amount updated successfully!');
    }

    private function generateMonthlyData(): array
    {
        $monthlyData = [];
        $year = Carbon::now()->year;

        for ($month = 1; $month <= 12; $month++) {
            $startOfMonth = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $endOfMonth = Carbon::createFromDate($year, $month, 1)->endOfMonth();

            $monthlySale = Sale::where('user_id', Auth::id())
                ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->sum('sold');

            $monthlyData[] = [
                'month' => $startOfMonth->format('M'),
                'sold' => $monthlySale,
                'target' => $this->sale->target_amount,
            ];
        }

        return $monthlyData;
    }
}
