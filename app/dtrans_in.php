<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dtrans_in extends Model
{
    //
    protected $table='dtrans_in';
    // protected $primaryKey = 'id_htrans_in';
    protected $fillable= [
        'id_htrans_in','id_barang','jumlah_barang'
    ];

    public $incrementing=false;
    public $timestamps= false;
}
