<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
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

        return redirect()->route('home.index')->with('success', 'Succesfully Enrolled into the FeatherSales tool');
    }
}
