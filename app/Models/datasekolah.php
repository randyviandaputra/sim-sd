<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datasekolah extends Model
{
   protected $primaryKey = 'id';
    protected $fillable = [
    	'id',
        'nama_sekolah',
        'daerah',
    ];

}
