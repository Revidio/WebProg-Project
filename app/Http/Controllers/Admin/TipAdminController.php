<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tip;

class TipAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tips = Tip::all();
        return view('admin.tips.index', compact('tips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'benefits' => 'required',
            'energy_saving' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('tips', 'public');
        }

        Tip::create($validated);

        return redirect('/admin/tips')->with('success', 'Tip created successfully!');
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
    public function edit(Tip $tip)
    {
        return view('admin.tips.edit', compact('tip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tip $tip)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'benefits' => 'required',
            'energy_saving' => 'required',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('tips', 'public');
        }

        $tip->update($validated);

        return redirect('/admin/tips')->with('success', 'Tip updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tip $tip)
    {
        $tip->delete();
        return redirect('/admin/tips')->with('success', 'Tip deleted successfully!');
    }
}
