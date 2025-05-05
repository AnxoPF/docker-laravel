<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'precio' => $this->faker->randomFloat(2, 50, 2000),
            'descripcion' => $this->faker->sentence(),
            'stock' => $this->faker->numberBetween(1, 50),
        ];
    }
}