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
        $imgArray = [
            '0693445251_1_1_1.jpg',
            '0706301811_1_1_1.jpg',
            '1792455401_1_1_1.jpg',
            '3859401732_1_1_1.jpg',
            '3918402401_1_1_1.jpg',
            '3918420710_1_1_1.jpg',
            '4314509658_1_1_1.jpg',
            '4398519400_1_1_1.jpg',
            '7505410251_1_1_1.jpg',
            '9065437707_2_1_1.jpg',
            'Wxl-_19PE_juin18_3490.jpg',
            'wxl-_Carpentie-011.jpg',
            'wxl-_fideler_antic_blue5.jpg',
            'wxl-_New_Coleen-006.jpg',
            'Wxl-_Port_Jackson-031.jpg',
            'wxl-cala_punta-whiblack-081.jpg',
            'wxl-santo_amaro-whiblack-04.jpg',
            'wxl-seaside-denim_blue-01.jpg',
            'wxl-stella-guerande-02.jpg',
            'wxl-yagi-roseastripes-05.jpg'
        ];

        return [
            'category_id' => $this->faker->numberBetween(1, 2),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'size' => $this->faker->randomElement($array = array ('XS','S','M','L','XL')),
            'picture_name' => $this->faker->randomElement($imgArray),
            'published' => $this->faker->numberBetween(0, 1),
            'discount' => $this->faker->numberBetween(0, 1),
            'reference' => $this->faker->bothify('?###??##?###??##'),
        ];
    }
}
