<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();

        return view('alternatif.index', compact('alternatif'));
    }

    public function create()
    {
        return view('alternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required'
        ]);

        Alternatif::create($request->all());

        return redirect()->route('alternatif.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);

        return view('alternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        $alternatif->update($request->all());

        return redirect()->route('alternatif.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Alternatif::destroy($id);

        return redirect()->route('alternatif.index')
            ->with('success', 'Data berhasil dihapus');
    }
}