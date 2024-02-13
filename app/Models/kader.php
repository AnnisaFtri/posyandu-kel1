<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kader extends Model
{
    use HasFactory;
    protected $table = 'kader';
    protected $primarykey = 'nomor_petugas';
    protected $fillable = ['username', 'nomor_petugas', 'nama_kader', 'tanggal_lahir_kader', 'jenis_kelamin_kader', 
                            'alamat', 'no_telepon_kader', 'nama_posyandu'];

    protected $timestamps = false;

    function auth(): BelongsTo
    {
        return $this->belongsTo(auth::class, 'username', 'username');
    }
}
