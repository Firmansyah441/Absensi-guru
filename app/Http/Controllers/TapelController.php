<?php

namespace App\Http\Controllers;

use App\Models\Tapel;
use Illuminate\Http\Request;

class TapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tapels = Tapel::all();
        return view('admin.data_tapel', compact('tapels'));
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
          // Validasi data
          $request->validate([
            'semester' => 'required|in:ganjil,genap',
            'tahun_ajaran' => 'required|string',
            'status' => 'required|in:aktif,tidak aktif',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Menyimpan tahun pelajaran baru
        Tapel::create($request->all());
        alert()->success('SuccessAlert','berhasil ngap.');
        return redirect()->back()->with('success', 'Guru berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $tapel = Tapel::latest()->first();
        return view('admin.kelola_absen', compact('tapel'));
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
        $request->validate([
            'semester' => 'required|in:ganjil,genap',
            'tahun_ajaran' => 'required|string',
            'status' => 'required|in:aktif,tidak aktif',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Update tahun ajaran
        $tapel = Tapel::findOrFail($id);
        $tapel->update($request->all());
        alert()->success('SuccessAlert', 'Berhasil memperbarui tahun ajaran.');
        return redirect()->back()->with('success', 'Tahun ajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tapel = Tapel::findOrFail($id);
        $tapel->delete();
        alert()->success('SuccessAlert', 'Berhasil menghapus tahun ajaran.');
        return redirect()->back()->with('success', 'Tahun ajaran berhasil dihapus.');
    }
}
