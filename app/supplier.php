<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    protected $table='supplier';
    protected $primaryKey = 'id_supplier';
    protected $fillable= [
        'nama_supplier','id_supplier'
    ];

    public $incrementing=false;
    public $timestamps= false;
}
