<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grafik_perkembangan extends Model
{
    use HasFactory;
    protected $table = 'grafik_perkembangan';
    protected $primarykey = 'id_grafik_perkembangan';
    protected $fillable = ['jenis', 'id_grafik_perkembangan', 'jenis_kelamin', 'umur', 'kbm', 'normal', 
    'gizi_kurang', 'gizi_buruk', 'gizi_lebih', 'gizi_mikro'];
}
