<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Car;

class CarFactory extends Factory
{

    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'manufacturer_id' => $this->faker->numberBetween(1, 10),
            'model' => $this->faker->word,
            'year' => $this->faker->year,
            'color' => $this->faker->colorName,
        ];
    }
}
