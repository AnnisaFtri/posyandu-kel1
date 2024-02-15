<?php

namespace App\Http\Controllers;

use App\Models\jenis_pelayanan;
use Illuminate\Http\Request;

class JenisPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_pelayanan = jenis_pelayanan::all();
        return view('jenispelayanan.index', compact('jenis_pelayanan'));
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
            'id_pelayanan' => 'required',
            'jenis_pelayanan' => ['required', 'max:50'],
            'tanggal_pelayanan' => 'required'
            
        ]);
            //  dd($data);
        if ($data) {
           
            $dataInsert = jenis_pelayanan::create($data);

            

            if ($dataInsert) {
                return redirect()->to('/jenispelayanan')->with('success', 'Jenis pemeriksaan berhasil ditambah');
            }
            dd($dataInsert);
        }

        return redirect()->to('/jenispelayanan')->with('error', 'Gagal tambah data');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, jenis_pelayanan $jenis_pelayanan)
    {
            //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jenis_pelayanan $jenis_pelayanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(Request $request, jenis_pelayanan $jenis_pelayanan)
    {
        $idPelayanan = $request->input('id_pelayanan');
        $data = $jenis_pelayanan->where('id_pelayanan', $idPelayanan)->delete();
        return response()->json($data);
    }
}
