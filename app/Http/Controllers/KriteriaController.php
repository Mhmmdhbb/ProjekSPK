<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kriteria' => 'required|unique:kriterias',
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'tipe' => 'required|in:benefit,cost'
        ]);

        Kriteria::create($validated);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        return view('kriteria.show', compact('kriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $validated = $request->validate([
            'kode_kriteria' => 'required|unique:kriterias,kode_kriteria,' . $kriteria->id,
            'nama_kriteria' => 'required',
            'bobot' => 'required|numeric',
            'tipe' => 'required|in:benefit,cost'
        ]);

        $kriteria->update($validated);

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus');
    }
}
