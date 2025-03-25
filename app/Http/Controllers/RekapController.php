<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Guru;
use Carbon\Carbon;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tapels = Tapel::all();
        $gurus = Guru::with('absens')->get();

        $selectedBulan = $request->input('bulan', Carbon::now()->format('m')); // Default to current month

    // Generate an array of months for the dropdown
    $months = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];

    return view('admin.rekap_absen', compact('tapels', 'gurus', 'selectedBulan', 'months'));
    }
    public function getMonthlyRekap($tapelId, $month)
{
    $gurus = Guru::with(['absens' => function ($query) use ($tapelId, $month) {
        $query->whereMonth('tanggal', $month)
              ->whereHas('tapel', function ($q) use ($tapelId) {
                  $q->where('id', $tapelId);
              });
    }])->get();

    $data = $gurus->map(function ($guru) {
        return [
            'name' => $guru->name,
            'nip' => $guru->nip,
            'nuptk' => $guru->nuptk,
            'hadir' => $guru->absens->where('status', 'hadir')->count(),
            'sakit' => $guru->absens->where('status', 'sakit')->count(),
            'izin' => $guru->absens->where('status', 'izin')->count(),
            'alfa' => $guru->absens->where('status', 'alfa')->count(),
        ];
    });

    return response()->json($data);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
