<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cycles = Cycle::all();
        return view('cycles.index', compact('cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cycles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Cycle::create($request->all());

        return redirect()->route('cycles.index')->with('success', 'Cycle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cycle $cycle)
    {
        return view('cycles.show', compact('cycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cycle $cycle)
    {
        return view('cycles.edit', compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cycle $cycle)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $cycle->update($request->all());

        return redirect()->route('cycles.index')->with('success', 'Cycle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cycle $cycle)
    {
        $cycle->delete();
        return redirect()->route('cycles.index')->with('success', 'Cycle deleted successfully.');
    }
}
