<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;

    protected $table = 'tb_penulis';
    protected $primaryKey = 'id_penulis';
    protected $fillable = [
         '', 'username', 'password', 'id',
    ];
}
