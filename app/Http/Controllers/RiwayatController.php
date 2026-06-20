<?php

namespace App\Http\Controllers;

use App\Models\HasilMaut;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    /**
     * Tampilkan riwayat perhitungan MAUT milik user yang login
     */
    public function index()
    {
        $userId = Auth::id();

        $riwayat = HasilMaut::with('alternatif')
            ->where('user_id', $userId)
            ->orderBy('ranking', 'asc')
            ->get();

        return view('riwayat.index', compact('riwayat'));
    }
}
