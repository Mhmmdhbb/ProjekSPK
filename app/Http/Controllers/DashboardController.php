<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\HasilMaut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard Admin — statistik global
     */
    public function adminDashboard()
    {
        $kriteria = Kriteria::count();
        $subKriteria = SubKriteria::count();
        $alternatif = Alternatif::count();
        $penilaian = Penilaian::count();
        $totalUser = User::where('role', 'user')->count();

        // Ambil hasil MAUT teratas (global)
        $hasilMautTerbaik = HasilMaut::orderBy('nilai_akhir', 'desc')->first();
        $alternatifTerbaik = $hasilMautTerbaik ? $hasilMautTerbaik->alternatif->nama_alternatif : 'Belum ada data';

        // Ranking global
        $ranking = HasilMaut::with('alternatif')
            ->orderBy('nilai_akhir', 'desc')
            ->get()
            ->unique('alternatif_id');

        return view('admin.dashboard', compact(
            'kriteria',
            'subKriteria',
            'alternatif',
            'penilaian',
            'totalUser',
            'alternatifTerbaik',
            'ranking'
        ));
    }

    /**
     * Dashboard User — statistik penilaian milik user yang login
     */
    public function userDashboard()
    {
        $userId = Auth::id();

        $totalPenilaian = Penilaian::where('user_id', $userId)->count();
        $totalPerhitungan = HasilMaut::where('user_id', $userId)->distinct('created_at')->count();

        $alternatif = Alternatif::count();
        $kriteria = Kriteria::count();

        // Hasil MAUT terbaik milik user
        $hasilTerbaik = HasilMaut::where('user_id', $userId)
            ->orderBy('nilai_akhir', 'desc')
            ->first();
        $alternatifTerbaik = $hasilTerbaik ? $hasilTerbaik->alternatif->nama_alternatif : 'Belum ada perhitungan';

        // Ranking milik user
        $ranking = HasilMaut::with('alternatif')
            ->where('user_id', $userId)
            ->orderBy('nilai_akhir', 'desc')
            ->get();

        return view('user.dashboard', compact(
            'totalPenilaian',
            'totalPerhitungan',
            'alternatif',
            'kriteria',
            'alternatifTerbaik',
            'ranking'
        ));
    }
}