<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\kepala_keluarga;
use App\Models\Auth as User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use TheSeer\Tokenizer\Exception;
use App\Http\Controllers\landingpageController;
use App\http\Controllers\AnakController;
class AuthController extends Controller
{   

    public function index()
    {
        //
        return view('auth.login');
    }
    public function indexsementara()
    {
        //
        return view('login.test');
    }

    public function registercheck(Request $request, kepala_keluarga $kepala_keluarga, User $user)
    {
       
        $data_akun = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'foto' => 'file|required'
        ]);
        
        $data_kepala_keluarga = $request->validate([
            'no_kk' => 'required',
            'nama_ayah' => 'required',
            'alamat_ayah' => 'required'
        ]);
        
        
if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
    $foto_file = $request->file('foto');
    $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
    $foto_file->move(public_path('foto_akun'), $foto_nama);
    $data_akun['foto'] = $foto_nama;
}
        $data_akun['password'] = Hash::make($data_akun['password']);
        $data_akun['role'] = "warga";
        
        $id_user = $user->create($data_akun)->id_user;
        $data_kepala_keluarga['id_user'] = $id_user;
        $kepala_keluarga->create($data_kepala_keluarga);

        return redirect()->to('/login');
    }

    public function logincheck(Request $request)
    {
        
        $akun = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ]
        );
        if (Auth::attempt($akun)) {
        
            // $request->session()->regenerate();
             if (Auth::user()->role == 'admin' || Auth::user()->role == 'operator'):
                return redirect()->to('/dashboard')->with('success','Anda berhasil Login!');
            elseif(Auth::user()->role == 'warga'):
                return redirect()->to('/newsbabies')->with('success','Anda berhasil Login!');
             else:
                 return redirect()->to('/')->with('success','Anda berhasil Login!');;
             endif;
        }else{
           
        }
        return redirect('/login')->with('error', 'Password/Username yang anda masukkan salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register()
{
    
    return view('auth.register');
}


    }
