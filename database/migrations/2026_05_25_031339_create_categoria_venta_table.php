<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categoria;
use App\Models\Venta;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categoria_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Categoria::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Venta::class)->constrained('backpack')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categoria_venta');
    }
};
