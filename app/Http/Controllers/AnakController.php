<?php

namespace App\Http\Controllers;

use App\Models\anak;
use App\Models\kepala_keluarga;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;

class AnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'anak' => anak::with( 'kepala_keluarga')->orderByDesc('id_anak')->get(),
            'kepala_keluarga' => kepala_keluarga::all()
        ];
    return view('dataanak.index', $data);
        
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
        $data = $request->validate([
            'id_anak' => 'required',
            'no_kk' => ['required', 'max:40'],
            'nama_anak' => 'required',
            'tanggal_lahir' => 'required',
            'nama_orangtua' => 'required',
            'jenis_kelamin' => 'required',
            'anak_ke' => 'required',
            'alamat' => 'required'
            
        ]);

        // dd($request->all());

        if ($data) {
            $dataInsert = anak::create($data);
            if ($dataInsert) {
                return redirect()->to('/dataanak')->with('success', 'Data anak berhasil ditambah');
            }
        }

        return redirect()->to('/dataanak')->with('error', 'Gagal tambah data');
    }

    /**
     * Update the specified resource in storage.
     */


    public function edit(Request $request, anak $anak)
    {
        $idAnak = $request->input('id_anak');
        $data = $anak->where('id_anak', $idAnak)->first();
        return response()->json($data);
    }

    public function update(Request $request, anak $anak)
    {
        $data = $request->validate([
            "id_anak" => "sometimes",
            "no_kk" => "sometimes",
            "nama_orangtua" => "sometimes",
            "nama_anak" => "sometimes",
            "tanggal_lahir" => "sometimes",
            "anak_ke" => "sometimes",
            "alamat" => "sometimes"
        ]);
        if($data)
        {
            $anak->where('id_anak', $request->id_anak)->update($data);
            return redirect()->back()->with('flash_message_success','Update Berhasil');
        }
    }
    // public function destroy(anak $anak)
    public function hapus(Request $request, anak $anak)
    {
        $idAnak = $request->input('id_anak');
        $data = $anak->where('id_anak', $idAnak)->delete();
        return response()->json($data);
    }
    
// public function show(anak $anak)
    public function detail(Request $request, anak $anak)
    {
        $idAnak = $request->input('id_anak');
        $data = $anak->where('id_anak', $idAnak)->first();
        return response()->json($data);
    } 


    public function cetak()
    {
     $anak = Anak::all();
 
     $pdf = PDF::loadview('dataanak.cetak',['anak'=>$anak]);
     return $pdf->download('laporan-dataanak-pdf');
    }
}
    // public function detail(Request $request)
    // {
    //     $id =$request->id;
    //     $data = [
    //         'id_anak' => id_anak::find($id)
    //     ];
    //     return view('dashboard.dataanak.detail', $data);  
    // }

    
/**
     * Remove the specified resource from storage.
     */
