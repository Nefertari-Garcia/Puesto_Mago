<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Venta>
 */
class VentaFactory extends Factory
{
    protected $model = Venta::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'     => User::factory(),
            'descripcion' => fake()->sentence(6),
            'precio'      => fake()->randomFloat(2, 30, 1000),
            'image'       => null,
        ];
    }
}
