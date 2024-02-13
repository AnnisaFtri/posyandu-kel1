<?php

namespace App\Http\Controllers;

use App\Models\pemeriksaan;
use App\Models\anak;

use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeriksaan = Pemeriksaan::all();
        return view('pemeriksaan.index', compact('pemeriksaan'));
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
        $data = $request->validate([
            'id_pemeriksaan' => 'required',
            'nama_anak' => ['required', 'max:50'],
            'tanggal_pemeriksaan' => 'required',
            'usia' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'lingkar_kepala' => 'required',
            'status_gizi' => 'required',
            'saran' => 'required'
            
        ]);
             // dd($request->all());
        if ($data) {
           
            $dataInsert = Pemeriksaan::create($data);
            if ($dataInsert) {
                return redirect()->to('/pemeriksaan')->with('success', 'Jenis pemeriksaan berhasil ditambah');
            }
        }

        return redirect()->to('/pemeriksaan')->with('error', 'Gagal tambah data');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemeriksaan $pemeriksaan)
    {
        //
    }
}
