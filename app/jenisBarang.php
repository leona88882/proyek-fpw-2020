<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisBarang extends Model
{
    //
    protected $table='jenis_barang';
    protected $primaryKey = 'id_jenis';
    protected $fillable= [
        'nama_barang','id_barang','id_jenis','stock_barang','harga_barang'
    ];

    public $incrementing=false;
    public $timestamps= false;
}
