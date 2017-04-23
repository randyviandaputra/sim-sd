<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class matpel extends Model
{
	use SoftDeletes;
    protected $primaryKey = 'id_matpel';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id_matpel',
        'kode_matpel',
        'nama_matpel',
        'kkm',
    ];
    public static function drop_options()
    {
        $query = array('' => 'Pilih Mata Pelajaran') + self::pluck('nama_matpel', 'id_matpel')->toArray();
        return $query;
    }
}
