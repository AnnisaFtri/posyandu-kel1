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
        $data = [
            'jenis_pelayanans' => jenis_pelayanan::all()
        ];

        return view('jenispelayanan.index', $data);
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
            'jenis_pelayanan' => ['required', 'max:40'],
            'tanggal_pelayanan' => 'required',
        ]);

        // dd($request->all());

        if ($data) {
           
            $dataInsert = jenis_pelayanan::create($data);
            if ($dataInsert) {
                return redirect()->to('/jenispelayanan')->with('success', 'Jenis pelayanan berhasil ditambah');
            }
        }

        return redirect()->to('/jenispelayanan')->with('error', 'Gagal tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis_pelayanan $jenis_pelayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis_pelayanan $jenis_pelayanan)
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
 public function hapus(Request $request)
{
    $id_pelayanan = $request->input('id_pelayanan');

    $jenis_pelayanan = jenis_pelayanan::findOrFail($id_pelayanan);
    $jenis_pelayanan->delete();

    return response()->json(['message' => 'Data berhasil dihapus']);
}
}