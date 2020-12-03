<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class htrans_in extends Model
{
    //
    protected $table='htrans_in';
    protected $primaryKey = 'id_htrans_in';
    const CREATED_AT = 'tanggal_htrans_in';
    const UPDATED_AT = null;
    protected $fillable= [
        'id_htrans_in','id_supplier'
    ];

    public $incrementing=false;
    public $timestamps= true;
}
