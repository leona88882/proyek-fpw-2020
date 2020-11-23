<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table='barang';
    protected $primaryKey = 'id_barang';
    protected $fillable= [
        'nama_barang','id_barang','id_jenis','stock_barang','harga_barang'
    ];

    public $incrementing=false;
    public $timestamps= false;
}
