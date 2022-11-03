<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spt extends Model
{
    protected $table = 'spt';
    protected $fillable = [
        'no_spt',
        'tgl_berangkat',
        'tgl_kembali',
        'asal',
        'tujuan',
        'transportasi',
        'status',
        'id_user',
    ];
    protected $primaryKey = 'id';
}
