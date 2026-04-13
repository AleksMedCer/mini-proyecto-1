<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Venta;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuarios
        $users = User::factory(10)->create();

        // Categorías
        $categorias = Categoria::factory(5)->create();

        // Productos
        $productos = Producto::factory(20)->create([
            'user_id' => $users->random()->id
        ]);

        // Relacionar productos con categorías
        foreach ($productos as $producto) {
            $producto->categorias()->attach(
                $categorias->random(2)->pluck('id')
            );
        }

        // Ventas
        Venta::factory(15)->create([
            'vendedor_id' => $users->random()->id,
            'cliente_id' => $users->random()->id
        ]);
    }
}