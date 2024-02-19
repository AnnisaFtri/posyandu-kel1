<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hasil Permeriksaan Anak {{ $pemeriksaan->nama_anak }} </h1>
    <p>Id Pemeriksaan : {{ $pemeriksaan->id_pemeriksaan }} </p>
    <p>Id Anak : {{ $pemeriksaan->id_anak }} </p>
    <p>Nama Anak : {{ $pemeriksaan->nama_anak }} </p>
    <p>Tanggal Pemeriksaan : {{ $pemeriksaan->tanggal_pemeriksaan }} </p>
    <p>Usia : {{ $pemeriksaan->usia }} </p>
    <p>Berat Badan : {{ $pemeriksaan->berat_badan }} </p>
    <p>Tinggi Badan  : {{ $pemeriksaan->tinggi_badan }} </p>
    <p>Lingkar Kepala : {{ $pemeriksaan->lingkar_kepala }} </p>
    <p>Status Gizi : {{ $pemeriksaan->status_gizi }} </p>
    <p>Saran : {{ $pemeriksaan->saran }} </p>
</body>
</html>