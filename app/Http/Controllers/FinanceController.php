<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinanceRequest;
use App\Models\Finance;
use App\Models\FinanceCategory;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function index()
    {
        $finance = Finance::where('user_id', Auth::id())->get();
        $financeCategory = FinanceCategory::all();

        return view('finance.index', compact('finance', 'financeCategory'));
    }

    public function store(FinanceRequest $request)
    {
        $user = Auth::user();

        $validated = $request->validated();
        $validated['amount_available'] = $validated['income'] - $validated['fixed_costs'];

        if ($user->finance_id) {
            $user->finance_id = null;
            $user->save();
            Finance::destroy($user->finance_id);
        }

        $finance = Finance::create($validated);

        $user->finance_id = $finance->id;
        $user->save();

        return redirect()->route('finance.index')->with('success', 'Finance record updated successfully!');
    }
}
