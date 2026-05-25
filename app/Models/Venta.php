<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venta extends Model
{
    protected $table = 'backpack';
    protected $fillable = ['user_id', 'descripcion', 'precio', 'image'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //protected $guarded = []:
}
