<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
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