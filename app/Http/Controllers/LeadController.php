<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('leads.index', ['leads' => Lead::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required',
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'required',
        ]);

        $validated['user_id'] = Auth::id();

        Lead::create($validated);

        return redirect()->route('leads.index')->with('success', 'Lead record updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lead = Lead::findOrFail($id);

        return view('leads.edit', ['lead' => $lead]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'company_name' => 'required',
            'name' => 'required',
            'email' => 'nullable',
            'phone' => 'required',
            'type' => 'nullable',
        ]);
        $validated['user_id'] = Auth::id();

        $lead = Lead::findOrFail($id);
        $lead->update($validated);

        return redirect('/leads');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lead::destroy($id);

        return redirect('/leads');
    }
}
