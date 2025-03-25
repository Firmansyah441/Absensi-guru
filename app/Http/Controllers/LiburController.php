<?php

namespace App\Http\Controllers;

use App\Models\Libur;
use App\Models\Tapel;
use Illuminate\Http\Request;

class LiburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liburs = Libur::with('tapel')->get();
        $tapels = Tapel::all();
        return view('admin.data_libur', compact('liburs', 'tapels'));
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
        $request->validate([
            'tapel_id' => 'required|exists:tapels,id', // Pastikan tapel_id ada di tabel tapels
            'nama_libur' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Menyimpan libur baru
        Libur::create($request->only(['tapel_id', 'nama_libur', 'tanggal_mulai', 'tanggal_selesai']));
        alert()->success('SuccessAlert', 'Libur berhasil ditambahkan.');
        return redirect()->back()->with('success', 'Libur berhasil ditambahkan.');
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
        // Validasi data
        $request->validate([
            'tapel_id' => 'required|exists:tapels,id',
            'nama_libur' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        // Update libur
        $libur = Libur::findOrFail($id);
        $libur->update($request->only(['tapel_id', 'nama_libur', 'tanggal_mulai', 'tanggal_selesai']));
        alert()->success('SuccessAlert', 'Libur berhasil diperbarui.');
        return redirect()->back()->with('success', 'Libur berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libur = Libur::findOrFail($id);
        $libur->delete();
        alert()->success('SuccessAlert', 'Libur berhasil dihapus.');
        return redirect()->back()->with('success', 'Libur berhasil dihapus.');
    }
}
