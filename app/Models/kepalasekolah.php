<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kepalasekolah extends Model
{
   protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
        'nama_kepala',
        'no_induk',
        'tahun',
    ];
}
