<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Venta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class VentaTest extends TestCase
{
    use RefreshDatabase;

    // ─────────────────────────────────────────────
    // 1. GET → Código 200 y texto visible (25 pts)
    // ─────────────────────────────────────────────
    public function test_usuario_autenticado_puede_ver_lista_de_ventas(): void
    {
        $user = User::factory()->create();

        $venta = Venta::factory()->create([
            'user_id'     => $user->id,
            'descripcion' => 'Mochila de prueba',
            'precio'      => 199.99,
        ]);

        $response = $this->actingAs($user)->get(route('ventas.index'));

        $response->assertStatus(200);
        $response->assertSee('Mochila de prueba');
    }

    // ─────────────────────────────────────────────
    // 2. POST → Crea registro en DB y redirige (25 pts)
    // ─────────────────────────────────────────────
    public function test_usuario_autenticado_puede_crear_una_venta(): void
    {
        Storage::fake('public');

        $user  = User::factory()->create();
        $image = UploadedFile::fake()->image('mochila.jpg');

        $response = $this->actingAs($user)->post(route('ventas.store'), [
            'descripcion' => 'Mochila nueva',
            'precio'      => 350.00,
            'image'       => $image,
        ]);

        $this->assertDatabaseHas('backpack', [
            'user_id'     => $user->id,
            'descripcion' => 'Mochila nueva',
            'precio'      => 350.00,
        ]);

        $response->assertRedirect(route('ventas.index'));
    }

    // ─────────────────────────────────────────────
    // 3. POST con datos incorrectos → Error de validación (25 pts)
    // ─────────────────────────────────────────────
    public function test_validacion_falla_si_datos_son_incorrectos_o_faltan(): void
    {
        $user = User::factory()->create();

        // Caso 1: todos los campos vacíos
        $response = $this->actingAs($user)->post(route('ventas.store'), []);

        $response->assertSessionHasErrors(['descripcion', 'precio']);

        // Caso 2: precio no es numérico
        $response2 = $this->actingAs($user)->post(route('ventas.store'), [
            'descripcion' => 'Mochila',
            'precio'      => 'no-es-numero',
        ]);

        $response2->assertSessionHasErrors(['precio']);
    }

    // ─────────────────────────────────────────────
    // 4. DELETE → Elimina de DB y redirige (25 pts)
    // ─────────────────────────────────────────────
    public function test_usuario_autenticado_puede_eliminar_una_venta(): void
    {
        $user  = User::factory()->create();

        $venta = Venta::factory()->create([
            'user_id'     => $user->id,
            'descripcion' => 'Mochila a eliminar',
            'precio'      => 100.00,
        ]);

        $response = $this->actingAs($user)->delete(route('ventas.destroy', $venta->id));

        $this->assertDatabaseMissing('backpack', [
            'id' => $venta->id,
        ]);

        $response->assertRedirect(route('ventas.index'));
    }
}
