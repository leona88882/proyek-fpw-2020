<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table='user';
    protected $primaryKey = 'username_user';
    protected $fillable= [
        'username_user',
        'password_user',
        'jenis_user',
        'status_delete_user'
    ];

    public $incrementing=false;
    public $timestamps= false;
}
