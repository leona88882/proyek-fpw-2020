<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dtrans_out extends Model
{
    protected $table='dtrans_out';
    protected $primaryKey = 'id_htrans_out';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    protected $fillable= [
      'ID_htrans_out' , 'id_barang','jumlah_barang','total_harga'
    ];

}
