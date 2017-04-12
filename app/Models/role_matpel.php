<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role_matpel extends Model
{
	protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_matpel',
        'tingkat',
    ];

}
