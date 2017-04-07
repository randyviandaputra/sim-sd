<?php

namespace App\Models;
use Carbon\carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class siswa extends Model
{
    use SoftDeletes;
	protected $primaryKey = 'id_siswa';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'no_induk_siswa','id_kelas','nama_siswa','tempat_lahir','tanggal_lahir','jenis_kelamin','golongan_darah','alamat','foto','hobi','telepon','agama',
    ];
    
    public function kelas()
    {
        return $this->belongsTo('\App\Models\Kelas', 'id_kelas', 'id_kelas');
    }
    
    public static function boot()
    {
        parent::boot();
        static::saving(function($data) {
            $data->tanggal_masuk = Carbon::now()->format('Y-m-d H:i:s');
        });
    }
}
