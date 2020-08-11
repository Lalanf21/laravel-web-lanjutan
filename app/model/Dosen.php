<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    protected $fillable = ['nidn', 'nama_dosen', 'alamat'];
    protected $guarded = [];
}
