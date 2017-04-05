<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;
class transaksi_nilai extends Model
{
    
    protected $primaryKey = 'id_nilai';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'id_guru',
        'no_induk_siswa',
        'nilai_tugas',
        'nilai_absensi',
        'nilai_uts',
        'nilai_uas',
        'nilai_rata_rata',
        'semester',
    ];
    public function siswa()
    {
        return $this->belongsTo('\App\Models\Siswa', 'no_induk_siswa', 'no_induk_siswa');
    }

    public static function boot()
    {
        parent::boot();
        static::saving(function($data) {
            $nilai_akhir = (\Request::get('nilai_tugas') + \Request::get('nilai_absensi') + \Request::get('nilai_uts') + \Request::get('nilai_uas')) / 4;
            $data->nilai_rata_rata = $nilai_akhir;
        });
    }
}
