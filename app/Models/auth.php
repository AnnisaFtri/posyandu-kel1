<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends Authenticatable
{
    use HasFactory,Notifiable,HasApiTokens;
    protected $table = 'table_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'username', 'password', 'role', 'foto'
    ];
    protected $casts = [
        'password' => 'hashed'
    ];

}
