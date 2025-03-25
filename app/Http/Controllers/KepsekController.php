<?php

namespace App\Http\Controllers;

use App\Models\Kepsek;
use Illuminate\Http\Request;

class KepsekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['kepseks'] = Kepsek::all();
        return view('admin.data_kepsek',$data);
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

    }

    /**
     * Display the specified resource.
     */
    public function show(Kepsek $kepsek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kepsek $kepsek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kepsek $kepsek)
    {
        $request->validate([
            'name' => 'required',
            'jenis_kelamin' => 'required',
            'nip' => 'required',
            'nuptk' => 'required',
            'alamat'=>'required',
            'no_telepon' => 'required',
        ]);

        $kepsek->update($request->all());
        alert()->success('SuccessAlert','berhasil ngap.');
        return redirect()->back()->with('success', 'Kepsek berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kepsek $kepsek)
    {
        $kepsek->delete();
        return redirect()->back()->with('success', 'Kepsek berhasil dihapus.');
    }
}
