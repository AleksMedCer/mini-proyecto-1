<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Producto;

class VentaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),
            'vendedor_id' => User::factory(),
            'cliente_id' => User::factory(),
            'fecha' => now(),
            'total' => $this->faker->randomFloat(2, 100, 5000),
        ];
    }
}