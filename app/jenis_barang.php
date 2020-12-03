<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_barang extends Model
{
    protected $table='jenis_barang';
    protected $primaryKey = 'id_jenis';
    protected $fillable= [
        'id_jenis','jenis_barang'
    ];

    public $incrementing=false;
    public $timestamps= false;
}
