<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    /**
     * Tampilkan penilaian milik user yang login
     */
    public function index()
    {
        $penilaians = Penilaian::with('alternatif', 'kriteria')
            ->where('user_id', Auth::id())
            ->get();

        return view('penilaian.index', compact('penilaians'));
    }

    /**
     * Form tambah penilaian — user memilih sub kriteria per kriteria
     */
    public function create()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::with('subKriteria')->get();

        return view('penilaian.create', compact('alternatifs', 'kriterias'));
    }

    /**
     * Simpan penilaian (batch per alternatif)
     */
    public function store(Request $request)
    {
        $request->validate([
            'alternatif_id' => 'required|exists:alternatifs,id',
            'nilai' => 'required|array',
            'nilai.*' => 'required|integer|min:1|max:5',
        ]);

        $userId = Auth::id();
        $alternatifId = $request->alternatif_id;

        foreach ($request->nilai as $kriteriaId => $nilai) {
            Penilaian::updateOrCreate(
                [
                    'user_id' => $userId,
                    'alternatif_id' => $alternatifId,
                    'kriteria_id' => $kriteriaId,
                ],
                [
                    'nilai' => $nilai,
                ]
            );
        }

        return redirect()->route('penilaian.index')
            ->with('success', 'Penilaian berhasil disimpan');
    }

    /**
     * Form edit penilaian
     */
    public function edit($alternatifId)
    {
        $alternatif = Alternatif::findOrFail($alternatifId);
        $kriterias = Kriteria::with('subKriteria')->get();

        // Ambil penilaian existing milik user untuk alternatif ini
        $existingPenilaian = Penilaian::where('user_id', Auth::id())
            ->where('alternatif_id', $alternatifId)
            ->pluck('nilai', 'kriteria_id')
            ->toArray();

        return view('penilaian.edit', compact('alternatif', 'kriterias', 'existingPenilaian'));
    }

    /**
     * Update penilaian
     */
    public function update(Request $request, $alternatifId)
    {
        $request->validate([
            'nilai' => 'required|array',
            'nilai.*' => 'required|integer|min:1|max:5',
        ]);

        $userId = Auth::id();

        foreach ($request->nilai as $kriteriaId => $nilai) {
            Penilaian::updateOrCreate(
                [
                    'user_id' => $userId,
                    'alternatif_id' => $alternatifId,
                    'kriteria_id' => $kriteriaId,
                ],
                [
                    'nilai' => $nilai,
                ]
            );
        }

        return redirect()->route('penilaian.index')
            ->with('success', 'Penilaian berhasil diperbarui');
    }

    /**
     * Hapus semua penilaian user untuk alternatif tertentu
     */
    public function destroy($alternatifId)
    {
        Penilaian::where('user_id', Auth::id())
            ->where('alternatif_id', $alternatifId)
            ->delete();

        return redirect()->route('penilaian.index')
            ->with('success', 'Penilaian berhasil dihapus');
    }
}
