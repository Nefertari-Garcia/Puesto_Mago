<?php

namespace App\Models;

use Database\Factories\VentaFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    /** @use HasFactory<VentaFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'backpack';
    protected $fillable = ['user_id', 'descripcion', 'precio', 'image'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'categoria_venta');
    }
}
