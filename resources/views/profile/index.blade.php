@extends('layout.app')
@section('title', 'profile')
@section('content')
<html>
<head>
    <title>Formulir Profil</title>
</head>
<body>

<h2>Profil Pengguna</h2>

@if(Session::has('success'))
    <p>{{ Session::get('success') }}</p>
@endif

<form action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="foto">Foto Profil:</label><br>
    <input type="file" id="foto" name="foto" accept="image/*"><br><br>
    <input type="submit" value="Simpan Profil">
</form>

</body>
</html>