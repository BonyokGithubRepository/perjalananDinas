<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    protected $table = 'kwitansi';
    protected $fillable = [
        'id_user',
        'uang_transport',
        'uang_dinas',
        'total',
    ];
    protected $primaryKey = 'id';
}
