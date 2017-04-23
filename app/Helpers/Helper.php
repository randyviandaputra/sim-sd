<?php

namespace App\Helpers;

class Helper
{
	public static function jenis_kelamin()
    {
        return ['' => 'Pilih', 'Laki - Laki' => 'Laki - Laki', 'Perempuan' => 'Perempuan'];
    }
    public static function status()
    {
        return ['' => 'Status', 'Y' => 'Aktif', 'N' => 'Tidak Aktif'];
    }
    public static function tingkat()
    {
        return ['' => 'Pilih Tingkat', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'];
    }

    public static function agama()
    {
        return ['Islam' => 'Islam', 'Protestan' => 'Protestan', 'Katholik' => 'Katholik', 'Hindu' => 'Hindu', 'budha' => 'Budha'];
    }

    public static function golongan_darah()
    {
        return ['A' => 'A', 'B' => 'B', 'O' => 'O', 'AB' => 'AB'];
    }

    public static function getJenisKelamin($id)
    {
        $jk = self::jenis_kelamin();

        return isset($jk[$id]) ? $jk[$id] : 'N/A';
    }
     public static function getTingkat($id)
    {
        $tingkats = self::tingkat();

        return isset($tingkats[$id]) ? $tingkats[$id] : 'N/A';
    }


    public static function getBulan($id)
    {
        $month = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );

        return isset($month[(int) $id]) ? $month[(int) $id] : '';
    }

    public static function getDateFormatId($date = false)
    {
        if ($date)
            return date('d', strtotime($date)) . ' ' . self::getBulan(date('n', strtotime($date))) . ' ' . date('Y', strtotime($date));
        else
            return date('d', time()) . ' ' . self::getBulan(date('n', time())) . ' ' . date('Y', time());
    }
}