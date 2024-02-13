<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sekretaris extends Model
{
    use HasFactory;
    protected $table = 'sekretaris';
    protected $primarykey = 'NIK';
    protected $fillable = ['username', 'NIK', 'nama_sekretaris', 'tanggal_lahir_sekretaris',
                        'jenis_kelamin', 'alamat', 'nama_posyandu', 'no_telpon_sekretaris'];

    protected $timestamps = false;

    function auth(): BelongsTo
    {
        return $this->belongsTo(auth::class, 'username', 'username');
    }
}
