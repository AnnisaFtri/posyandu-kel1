<?php

namespace App\Http\Controllers;

use App\Models\pemeriksaan;
use App\Models\anak;
use Barryvdh\DomPDF\Facade\Pdf;
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
            'id_anak' => 'required',
            'nama_anak' => ['required', 'max:50'],
            'tanggal_pemeriksaan' => 'required',
            'usia' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'lingkar_kepala' => 'required',
            'status_gizi' => 'required',
            'saran' => 'required'
            
        ]);
            //  dd($data);
        if ($data) {
           
            $dataInsert = Pemeriksaan::create($data);

            

            if ($dataInsert) {
                return redirect()->to('/pemeriksaan')->with('success', 'Jenis pemeriksaan berhasil ditambah');
            }
            dd($dataInsert);
        }

        return redirect()->to('/pemeriksaan')->with('error', 'Gagal tambah data');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,pemeriksaan $pemeriksaan)
    {
            $idPemeriksaan = $request->input('id_pemeriksaan');
            $data = $pemeriksaan->where('id_pemeriksaan', $idPemeriksaan)->first();
            return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pemeriksaan $pemeriksaan)
    {
        $data = $request->validate([
            "id_pemeriksaan" => "sometimes",
            "id_anak" => "sometimes", 
            "nama_anak" => "sometimes", 
            "tanggal_pemeriksaan" => "sometimes", 
            "usia" => "sometimes", 
            "berat_badan" => "sometimes", 
            "tinggi_badan" => "sometimes", 
            "lingkar_kepala" => "sometime", 
            "status_gizi" => "sometimes",
            "saran" => "sometimes"
        ]);

    if($data)
        {
            $pemeriksaan->where('id_pemeriksaan', $request->id_pemeriksaan)->update($data);
            return redirect()->back()->with('flash_message_success','Update Berhasil');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(Request $request, pemeriksaan $pemeriksaan)
    {
        $idPemeriksaan = $request->input('id_pemeriksaan');
        $data = $pemeriksaan->where('id_pemeriksaan', $idPemeriksaan)->delete();
        return response()->json($data);
    }
    public function cetak()
    {
     $pemeriksaan = Pemeriksaan::all();
 
     $pdf = PDF::loadview('pemeriksaan.cetak',['pemeriksaan'=>$pemeriksaan]);
     return $pdf->download('laporan-pemeriksaan-pdf');
    }
}
