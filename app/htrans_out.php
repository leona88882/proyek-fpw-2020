<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class htrans_out extends Model
{
    protected $table='htrans_out';
    protected $primaryKey = 'id_htrans_out';
    const CREATED_AT = 'tanggal_htrans_out';
    const UPDATED_AT = null;
    protected $fillable= [
      'ID_htrans_out' , 'username_pegawai','username_pelanggan','jumlah'
    ];

    public $incrementing=false;
    public $timestamps= true;
}
