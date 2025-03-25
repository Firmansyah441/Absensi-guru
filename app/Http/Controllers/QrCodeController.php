<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Absen;
use App\Models\Tapel;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tapel::with('guru')->get();
        $guru = Guru::all();
        return view('guru.absen', compact('data','guru'));
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
        // Validate input
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'idt' => 'required|exists:tapels,id',
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,alfa',
            'jam_masuk' => 'nullable',
            'jam_keluar' => 'nullable',
        ]);

        $existingAbsen = Absen::where('guru_id', $request->guru_id)
            ->where('tanggal', $request->tanggal)
            ->first();

        if ($existingAbsen) {
            $existingAbsen->update([
                'jam_keluar' => $request->jam_keluar,
                'status' => $request->status,
            ]);
        } else {
            Absen::create([
                'guru_id' => $request->guru_id,
                'tapel_id' => $request->idt,
                'tanggal' => $request->tanggal,
                'jam_masuk' => $request->jam_masuk,
                'jam_keluar' => $request->jam_keluar,
                'status' => $request->status,
            ]);
        }

        toast('Absen Berhasil', 'success');
        return redirect()->back()->with('success', 'Absen berhasil dicatat.');
    }



    /**
     * Display the specified resource.
     */
    public function show(QrCode $qrCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QrCode $qrCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QrCode $qrCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QrCode $qrCode)
    {
        //
    }
}
