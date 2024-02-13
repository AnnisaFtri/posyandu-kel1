<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tindak_lanjut extends Model
{
    use HasFactory;
    protected $table = 'tindak_lanjut';
    protected $primaryKey = 'id_tindak_lanjut';
    protected $fillablee = ['id_pelayanan', 'id_pemeriksaan', 'nomor_petugas', 'id_tindak_lanjut'];

    protected $timestamps = false;

    function jenis_pelayanan(): BelongsTo
    {
        return $this->belongsTo(jenispelayanan::class, 'id_pelayanan', 'id_pelayanan');
    }

    function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(pemeriksaan::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }

    function kader(): BelongsTo
    {
        return $this->belongsTo(kader::class, 'nomor_petugas', 'nomor_petugas');
    }
}
