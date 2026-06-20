<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\HasilMaut;
use Illuminate\Support\Facades\Auth;

class PerhitunganController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();

        // Ambil penilaian milik user yang login
        $matriks = [];
        $hasData = false;

        foreach ($alternatif as $alt) {
            foreach ($kriteria as $krit) {
                $nilai = Penilaian::where('user_id', $userId)
                    ->where('alternatif_id', $alt->id)
                    ->where('kriteria_id', $krit->id)
                    ->value('nilai');

                $matriks[$alt->id][$krit->id] = $nilai ?? 0;

                if ($nilai) {
                    $hasData = true;
                }
            }
        }

        // Jika belum ada data penilaian, tampilkan pesan
        if (!$hasData) {
            return view('perhitungan', [
                'alternatif' => $alternatif,
                'kriteria' => $kriteria,
                'matriks' => $matriks,
                'normalisasi' => [],
                'hasil' => []
            ]);
        }

        // Normalisasi MAUT
        $normalisasi = [];

        foreach ($kriteria as $krit) {
            $kolom = [];
            foreach ($alternatif as $alt) {
                $kolom[] = $matriks[$alt->id][$krit->id];
            }

            $max = max($kolom);
            $min = min($kolom);

            foreach ($alternatif as $alt) {
                $nilai = $matriks[$alt->id][$krit->id];

                if ($max == $min) {
                    $utility = 1;
                } else {
                    if ($krit->tipe == 'benefit') {
                        $utility = ($nilai - $min) / ($max - $min);
                    } else {
                        $utility = ($max - $nilai) / ($max - $min);
                    }
                }

                $normalisasi[$alt->id][$krit->id] = round($utility, 4);
            }
        }

        // Hitung nilai preferensi
        $hasil = [];

        foreach ($alternatif as $alt) {
            $total = 0;

            foreach ($kriteria as $krit) {
                $bobot = $krit->bobot / 100;
                $total += $normalisasi[$alt->id][$krit->id] * $bobot;
            }

            $hasil[] = [
                'alternatif_id' => $alt->id,
                'nama' => $alt->nama_alternatif,
                'nilai_akhir' => round($total, 4)
            ];
        }

        usort($hasil, function ($a, $b) {
            return $b['nilai_akhir'] <=> $a['nilai_akhir'];
        });

        // Simpan hasil — hapus hasil lama milik user ini, lalu simpan baru
        HasilMaut::where('user_id', $userId)->delete();

        foreach ($hasil as $index => $row) {
            HasilMaut::create([
                'user_id' => $userId,
                'alternatif_id' => $row['alternatif_id'],
                'nilai_akhir' => $row['nilai_akhir'],
                'ranking' => $index + 1
            ]);

            $hasil[$index]['ranking'] = $index + 1;
        }

        return view('perhitungan', compact(
            'alternatif',
            'kriteria',
            'matriks',
            'normalisasi',
            'hasil'
        ));
    }
}