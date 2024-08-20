<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinanceCategoryRequest;
use App\Models\FinanceCategory;
use Illuminate\Support\Facades\Auth;

class FinanceCategoryController extends Controller
{
    public function store(FinanceCategoryRequest $request)
    {
        $validated = $request->validated();

        FinanceCategory::create([
            'name' => $validated['finance_category_name'],
            'description' => $validated['finance_category_description'],
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('finance.index')->with('success', 'Finance Category record updated successfully!');
    }
}
