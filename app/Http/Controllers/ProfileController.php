<?php

namespace App\Http\Controllers;

use App\Models\kepala_keluarga;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id_user;
        $data = kepala_keluarga::where('table_user.id_user', $id_user)->join('table_user','kepala_keluargas.id_user', '=' ,'table_user.id_user')->first();
        return view('profile.index',compact('data'));
    }
    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:profiles',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $profile = new Profile();
        $profile->nama = $request->nama;
        $profile->email = $request->email;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time().'.'.$foto->getClientOriginalExtension();
            $lokasi_foto = public_path('/images');
            $foto->move($lokasi_foto, $nama_foto);
            $profile->foto = '/images/'.$nama_foto;
        }

        $profile->save();

        return redirect()->route('profile.create')->with('success', 'Profil berhasil disimpan!');
    }
}