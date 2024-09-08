<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\FinanceCategory;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function enrollFinances()
    {
        $user = Auth::user();
        $financeCategory = FinanceCategory::create();

        Finance::create([
            'user_id' => $user->id,
            'finance_category_id' => $financeCategory->id,
        ]);

        return redirect()->route('home.index')->with('success', 'Succesfully Enrolled into the FeatherFinance tool');
    }

    public function unenrollFinances()
    {
        $user = Auth::user();

        Finance::where('user_id', $user->id)->delete();

        return redirect()->route('home.index')->with('success', 'Succesfully removed the FeatherFinance tool');
    }

    public function enrollSales()
    {
        $user = Auth::user();

        Sale::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('home.index')->with('success', 'Succesfully Enrolled into the FeatherSales tool');
    }

    public function unenrollSales()
    {
        $user = Auth::user();

        Sale::where('user_id', $user->id)->delete();

        return redirect()->route('home.index')->with('success', 'Succesfully removed the FeatherSales tool');
    }
}
