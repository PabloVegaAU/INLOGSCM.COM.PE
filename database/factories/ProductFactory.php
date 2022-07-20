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
            'ubication' => $this->faker->name(),
            'barcode' => $this->faker->ean13(),
            'code' => "SG-" . $this->faker->randomDigit(7) . "-" . $this->faker->randomDigit(7),
            'ubication' => $this->faker->lastName(),
            'description' => $this->faker->text(),
            'stock' => $this->faker->randomDigit(),
        ];
    }
}
