<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProspectRequest;
use App\Models\Prospect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $prospects = Prospect::query();

        if ($filter) {
            $prospects->where('type', $filter);
        }
        $prospects = $prospects->get();

        // Return the view with filtered prospects and the selected filter
        return view('prospects.index', ['prospects' => $prospects, 'filter' => $filter]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProspectRequest $request)
    {
        Prospect::create($request->all());

        return redirect()->route('prospects.index')->with('success', 'Prospect record updated successfully!');
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
        $prospect = Prospect::findOrFail($id);

        return view('prospects.edit', ['prospect' => $prospect]);
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

        $lead = Prospect::findOrFail($id);
        $lead->update($validated);

        return redirect('/prospects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prospect::destroy($id);

        return redirect('/prospects');
    }
}
