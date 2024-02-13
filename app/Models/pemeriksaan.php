<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pemeriksaan extends Model
{
    use HasFactory;
    protected $table = 'pemeriksaans';
    protected $primaryKey = 'id_pemeriksaan';
    protected $fillable = ['id_anak', 'nama_anak', 'tanggal_pemeriksaan', 'usia', 
                    'berat_badan', 'tinggi_badan', 'lingkar_kepala', 'status_gizi','saran'];

    public $timestamps = false;

    function kader(): BelongsTo
    {
        return $this->belongsTo(kader::class, 'nomor_petugas','nomor_petugas');
    }

    function anak(): BelongsTo
    {
        return $this->belongsTo(anak::class, 'id_anak', 'id_anak');
    }
}
