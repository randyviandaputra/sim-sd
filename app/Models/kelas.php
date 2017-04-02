<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kelas extends Model
{
	protected $primaryKey = 'id_kelas';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id_kelas',
        'id_guru',
        'nama_kelas',
        'aktif',
    ];

     public function siswa()
    {
        return $this->hasMany('\App\Models\Siswa', 'id_kelas', 'id_kelas');
    }

}
