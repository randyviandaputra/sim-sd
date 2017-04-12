<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal_kelas extends Model
{
	protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'id_jadwal',
        'id_guru',
        'hari',
        'id_kelas',
    ];

}
