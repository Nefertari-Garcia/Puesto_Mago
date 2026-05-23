<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'backpack';
    protected $fillable = ['descripcion', 'precio'];

    //protected $guarded = []:
}
