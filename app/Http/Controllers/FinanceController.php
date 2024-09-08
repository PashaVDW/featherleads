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

        // Validate and calculate the amount_available
        $validated = $request->validated();
        $validated['amount_available'] = $validated['income'] - $validated['fixed_costs'];

        // If the user has an existing finance_id, clear the reference in the users table first
        if ($user->finance_id) {
            $user->finance_id = null; // Set the finance_id to null to break the foreign key reference
            $user->save(); // Save the user with the null finance_id
            Finance::destroy($user->finance_id); // Now it's safe to delete the finance record
        }

        // Create a new Finance record
        $finance = Finance::create($validated);

        // Update the user's finance_id with the new finance's ID and save the user
        $user->finance_id = $finance->id;
        $user->save();

        // Set a flash success message and redirect to the desired route
        return redirect()->route('finance.index')->with('success', 'Finance record updated successfully!');
    }
}
