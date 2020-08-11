<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $table='prodi';
    protected $primaryKey='kode_prodi';
    protected $fillable = ['kode_prodi', 'nama_prodi', 'kaprodi'];
    protected $guarded = [];
    
    public function mahasiswa()    
    {
        return $this->belongsTo('App\model\Mahasiswa','prodi','kode_prodi');    
    }
}
