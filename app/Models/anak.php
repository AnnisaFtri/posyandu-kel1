<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class anak extends Model
{
    use HasFactory;
    protected $table = 'anaks';
    protected $primarykey = 'id_anak';
    protected $fillable = ['no_kk', 'id_anak', 'nama_anak', 'tanggal_lahir', 'nama_orangtua','jenis_kelamin', 'anak_ke', 'alamat'];
    
    protected $timestamp = false;

    function kepala_keluarga(): BelongsTo
    {
        return $this->belongsTo(kepala_keluarga::class, 'no_kk', 'no_kk');
    }
}
