<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['gurus'] = Guru::all();
        return view('admin.data_guru',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guru = new Guru();
        $guru->name =$request->name;
        $guru->nip =$request->nip;
        $guru->nuptk =$request->nuptk;
        $guru->alamat =$request->alamat;
        $guru->no_telepon =$request->no_telepon;
        $guru->jenis_kelamin =$request->jenis_kelamin;
        $guru->mata_pelajaran =$request->mata_pelajaran;
        //Ulangi terus nepi ngeusian kabeh kolom kecuali kolom gambar
                if ($request->file()) {
                    $file = $request->file('gambar');
                    $extension = $file->getClientOriginalExtension();
                    $filename = $request->name . '_' . time() . '.' . $extension;
                    $filename = $file->storeAs('gambar_guru', $filename, 'public');
                    $guru->gambar = $filename;
                }
        $guru->save();
        alert()->success('SuccessAlert', 'Guru dan QR Code berhasil ditambahkan.');
        return redirect()->back()->with('success', 'Guru dan QR Code berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $guru = Guru::findOrfail($id);
        $guru->name =$request->name ?? $guru->name;
        $guru->nip =$request->nip ?? $guru->nip;
        $guru->nuptk =$request->nuptk ?? $guru->nuptk;
        $guru->alamat =$request->alamat ?? $guru->alamat;
        $guru->no_telepon =$request->no_telepon ?? $guru->no_telepon;
        $guru->jenis_kelamin =$request->jenis_kelamin ?? $guru->jenis_kelamin;
        $guru->mata_pelajaran =$request->mata_pelajaran ?? $guru->mata_pelajaran;
        $guru->save();

        if ($request->file()) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension() ;
            $filename = $request->name . '_' . time() . '.' . $extension;
            $filepath = $file->storeAs('gambar_guru',$filename,'public');
            $guru->gambar = $filepath;
            $guru->save();
        }
        alert()->success('SuccessAlert', 'Guru berhasil diperbarui.');
        return redirect()->back()->with('success', 'Guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus gambar QR code jika ada
        $guru = Guru::findOrfail($id);
        $guru->delete();
        alert()->success('SuccessAlert', 'Guru berhasil dihapus.');
        return redirect()->back()->with('success', 'Guru berhasil dihapus.');
    }
}
