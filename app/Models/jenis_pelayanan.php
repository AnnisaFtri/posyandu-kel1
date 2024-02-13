<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_pelayanan extends Model
{
    use HasFactory;
    protected $table = 'jenis_pelayanans';
    protected $primarykey = 'id_pelayanan';
    protected $fillable = ['id_pelayanan', 'jenis_pelayanan', 'tanggal_pelayanan'];
}
