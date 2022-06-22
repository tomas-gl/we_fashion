<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'size' => $this->faker->randomElement($array = array ('XS','S','M','L','XL')),
            'published' => $this->faker->numberBetween(0, 1),
            'discount' => $this->faker->numberBetween(0, 1),
            'reference' => $this->faker->bothify('?###??##?###??##'),
        ];
    }
}
