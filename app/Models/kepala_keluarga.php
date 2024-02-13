<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kepala_keluarga extends Model
{
    use HasFactory;
    protected $table = 'kepala_keluargas';
    protected $primarykey = 'no_kk';
    protected $fillable = ['username', 'no_kk', 'nama_ayah', 'alamat_ayah'];

    public $timestamps = false;

    function auth():BelongsTo
    {
        return $this->belongsTo(auth::class, 'username', 'username');
    }
}
