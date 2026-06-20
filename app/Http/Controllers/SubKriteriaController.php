<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function index()
    {
        $subKriteria = SubKriteria::with('kriteria')->get();

        return view('sub-kriteria.index', compact('subKriteria'));
    }

    public function create()
    {
        $kriterias = Kriteria::all();

        return view('sub-kriteria.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'nama_sub' => 'required|string',
            'nilai' => 'required|integer|min:1|max:5'
        ]);

        SubKriteria::create($request->all());

        return redirect()->route('sub-kriteria.index')
            ->with('success', 'Sub Kriteria berhasil ditambahkan');
    }

    public function edit($id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $kriterias = Kriteria::all();

        return view('sub-kriteria.edit', compact('subKriteria', 'kriterias'));
    }

    public function update(Request $request, $id)
    {
        $subKriteria = SubKriteria::findOrFail($id);

        $request->validate([
            'kriteria_id' => 'required|exists:kriterias,id',
            'nama_sub' => 'required|string',
            'nilai' => 'required|integer|min:1|max:5'
        ]);

        $subKriteria->update($request->all());

        return redirect()->route('sub-kriteria.index')
            ->with('success', 'Sub Kriteria berhasil diperbarui');
    }

    public function destroy($id)
    {
        $subKriteria = SubKriteria::findOrFail($id);
        $subKriteria->delete();

        return redirect()->route('sub-kriteria.index')
            ->with('success', 'Sub Kriteria berhasil dihapus');
    }
}
