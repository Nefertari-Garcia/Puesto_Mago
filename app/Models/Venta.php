<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'backpack';
    protected $fillable = ['user_id', 'descripcion', 'precio'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //protected $guarded = []:
}
